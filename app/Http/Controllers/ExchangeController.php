<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Role;
use App\Models\Currency;
use App\Models\Exchange;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Models\BankTransaction;
use Illuminate\Support\Facades\Auth;

class ExchangeController extends Controller
{
    public function index(Request $request)
    {
        $query = Exchange::with(['currency', 'user']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('username', 'like', "%{$search}%");
            })
                ->orWhere('id', 'like', "%{$search}%");
        }

        $exchanges = $query->paginate(10);

        return view('exchanges.index', compact('exchanges'));
    }

    public function create()
    {
        $currencies = Currency::all();
        $banks = Bank::all();
        $userTypes = UserType::all();
        $roles = Role::all();
        return view('exchanges.create', compact('currencies', 'banks','userTypes','roles'));
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'exchange_type' => 'required|in:buy,sell',
            'user_id' => 'required|exists:users,id',
            'currency_id' => 'required|exists:currencies,id',
            'quantity' => 'required|numeric|min:0.01',
            'rate' => 'required|numeric|min:0.01',
            'status' => 'required|in:pending,approved,canceled',
            'bank_id' => 'required|exists:banks,id', // Add validation for bank_id
            'paid_to_seller_bdt' => 'nullable|numeric|min:0' // Optional field for initial payment
        ]);

        // Calculate total amount and due amount
        $totalAmount = $validated['quantity'] * $validated['rate'];
        $paidAmount = $validated['paid_to_seller_bdt'] ?? 0;
        $dueAmount = $totalAmount - $paidAmount;

        // Determine payment status based on the paid amount
        $paymentStatus = 'Due';
        if ($paidAmount >= $totalAmount) {
            $paymentStatus = 'Paid';
        } elseif ($paidAmount > 0) {
            $paymentStatus = 'Partial';
        }

        // Create the exchange with all required fields
        $exchange = Exchange::create([
            'exchange_type' => $validated['exchange_type'],
            'user_id' => $validated['user_id'],
            'currency_id' => $validated['currency_id'],
            'quantity' => $validated['quantity'],
            'rate' => $validated['rate'],
            'total_amount' => $totalAmount,
            'status' => $validated['status'],
            'bank_id' => $validated['bank_id'],
            'paid_to_seller_bdt' => $paidAmount,
            'due_amount' => $dueAmount,
            'payment_status' => $paymentStatus,
        ]);

        // Process related transactions for currency and bank
        $exchange->processExchangeTransaction();

        return redirect()->route('exchanges.index')->with('success', 'Exchange created successfully.');
    }


    public function show(Exchange $exchange)
    {
        return view('exchanges.show', compact('exchange'));
    }

    public function edit(Exchange $exchange)
    {
        $currencies = Currency::all();
        $banks = Bank::all();
        return view('exchanges.edit', compact('exchange', 'currencies', 'banks'));
    }

    public function update(Request $request, Exchange $exchange)
    {
        $validated = $request->validate([
            'exchange_type' => 'required|in:buy,sell',
            'seller_name' => 'required_if:exchange_type,buy',
            'buyer_name' => 'required_if:exchange_type,sell',
            'currency_id' => 'required|exists:currencies,id',
            'quantity' => 'required|numeric',
            'rate' => 'required|numeric',
            'paid_to_seller_bdt' => 'nullable|numeric',
            'bank_id' => 'required|exists:banks,id',
            'status' => 'required|in:pending,approved,canceled',
        ]);

        $validated['total_amount'] = $validated['quantity'] * $validated['rate'];
        $validated['due_amount'] = max(0, $validated['total_amount'] - ($validated['paid_to_seller_bdt'] ?? 0));

        $exchange->update($validated);

        return redirect()->route('exchanges.index')->with('success', 'Exchange updated successfully');
    }

    public function destroy(Exchange $exchange)
    {
        $exchange->delete();
        return redirect()->route('exchanges.index')->with('success', 'Exchange deleted successfully');
    }

    public function completePartialPaymentForm($exchangeId)
    {
        $exchange = Exchange::findOrFail($exchangeId);

        return view('exchanges.payment', compact('exchange'));
    }

    public function completePartialPayment(Request $request, $exchangeId)
    {
        $request->validate([
            'additional_payment' => 'required|numeric|min:0.01',
        ]);

        $exchange = Exchange::findOrFail($exchangeId);

        // Calculate remaining due
        $remainingDue = $exchange->total_amount - $exchange->paid_to_seller_bdt;

        // Check if additional payment exceeds the remaining due
        if ($request->additional_payment > $remainingDue) {
            return redirect()->back()->withErrors(['additional_payment' => 'Payment exceeds remaining due amount']);
        }

        // Update paid amount and due amount in Exchange
        $exchange->paid_to_seller_bdt += $request->additional_payment;

        // Update payment status based on new total paid amount
        if ($exchange->paid_to_seller_bdt >= $exchange->total_amount) {
            $exchange->payment_status = 'Paid';
            $exchange->due_amount = 0;
        } else {
            $exchange->payment_status = 'Partial';
            $exchange->due_amount = $exchange->total_amount - $exchange->paid_to_seller_bdt;
        }
        $exchange->save();

        // Create a new BankTransaction
        $bank = $exchange->bank;
        $bankTransactionType = 'debit'; // Assuming outgoing payment for buyer
        $bankBalanceBefore = $bank->balance;
        $bankBalanceAfter = $bankBalanceBefore - $request->additional_payment;

        BankTransaction::create([
            'bank_id' => $exchange->bank_id,
            'exchange_id' => $exchange->id,
            'transaction_type' => $bankTransactionType,
            'amount' => $request->additional_payment,
            'balance_before' => $bankBalanceBefore,
            'balance_after' => $bankBalanceAfter,
            'notes' => 'Additional payment for exchange ID: ' . $exchange->id,
            'created_by_user_id' => auth()->id(),
        ]);

        // Update bank balance
        $bank->balance = $bankBalanceAfter;
        $bank->save();

        return redirect()->route('exchanges.index')->with('success', 'Additional payment recorded successfully.');
    }

}