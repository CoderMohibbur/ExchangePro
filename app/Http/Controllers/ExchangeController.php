<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Role;
use App\Models\Currency;
use App\Models\Exchange;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Models\BankTransaction;
use App\Models\CurrencyInventory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ExchangeController extends Controller
{
    public function index(Request $request)
    {
        $exchanges = Exchange::all();

        return view('exchanges.index', compact('exchanges'));
    }
    // public function index(Request $request)
    // {
    //     $query = Exchange::with(['currency', 'user']);

    //     if ($request->filled('search')) {
    //         $search = $request->input('search');
    //         $query->whereHas('user', function ($q) use ($search) {
    //             $q->where('full_name', 'like', "%{$search}%")
    //                 ->orWhere('username', 'like', "%{$search}%");
    //         })
    //             ->orWhere('id', 'like', "%{$search}%");
    //     }

    //     $exchanges = $query->paginate(20);

    //     return view('exchanges.index', compact('exchanges'));
    // }

    public function create()
    {
        $currencies = Currency::all();
        $banks = Bank::all();
        $userTypes = UserType::all();
        $roles = Role::all();
        return view('exchanges.create', compact('currencies', 'banks', 'userTypes', 'roles'));
    }

    // public function store(Request $request)
    // {
    //     // Validate incoming request data
    //    // Validate incoming request data
    //     $validated = $request->validate([
    //         'exchange_type' => 'required|in:buy,sell',
    //         'user_id' => 'required|exists:users,id',
    //         'currency_id' => 'required|exists:currencies,id',
    //         'quantity' => 'required|numeric|min:0.01',
    //         'rate' => 'required|numeric|min:0.01',
    //         'exchange_status' => 'required|in:pending,approved,canceled',
    //         'bank_id' => 'required|exists:banks,id', // Add validation for bank_id
    //         'paid_to_seller_bdt' => 'nullable|numeric|min:0', // Optional field for initial payment
    //         'npsb_fee' => 'nullable|numeric|min:0', // NPSB Fee
    //         'eft_beftn_fee' => 'nullable|numeric|min:0', // EFT/BEFTN Fee
    //         'fixed_currency_fee' => 'nullable|numeric|min:0', // Optional fixed currency fee
    //         'percent_currency_fee' => 'nullable|numeric|min:0', // Optional percentage currency fee
    //         'bank_transaction_fee' => 'nullable|numeric|min:0', // Optional percentage currency fee
    //         'currency_transaction_fee' => 'nullable|numeric|min:0', // Optional percentage currency fee
    //     ]);

    //     // Apply fees to adjust the quantity
    //     $fixedCurrencyFee = $validated['fixed_currency_fee'] ?? 0;
    //     $percentCurrencyFee = ($validated['currency_transaction_fee'] ?? 0) / 100 * $validated['quantity'];

    //     if ($validated['exchange_type'] === 'buy') {
    //         // For Buy, subtract fees from quantity
    //         $adjustedQuantity = $validated['quantity'] - ($fixedCurrencyFee + $percentCurrencyFee);

    //         // Ensure adjusted quantity is not negative
    //         if ($adjustedQuantity < 0) {
    //             throw new \Exception('Adjusted quantity cannot be less than zero due to fees.');
    //         }
    //     } else {
    //         // For Sell, the adjusted quantity remains the same
    //         $adjustedQuantity = $validated['quantity'];
    //     }

    //     // Calculate total amount and due amount
    //     $totalAmount = $validated['quantity'] * $validated['rate'];
    //     $paidAmount = $validated['paid_to_seller_bdt'] ?? 0;
    //     $dueAmount = $totalAmount - $paidAmount;

    //     // Determine payment status based on the paid amount
    //     $paymentStatus = 'Due';
    //     if ($paidAmount >= $totalAmount) {
    //         $paymentStatus = 'Paid';
    //     } elseif ($paidAmount > 0) {
    //         $paymentStatus = 'Partial';
    //     }

    //     // Create the exchange with all required fields, including fees
    //     $exchange = Exchange::create([
    //         'exchange_type' => $validated['exchange_type'],
    //         'user_id' => $validated['user_id'],
    //         'currency_id' => $validated['currency_id'],
    //         'orginal_quantity' => $validated['quantity'],
    //         'quantity' => $adjustedQuantity, // Use adjusted quantity
    //         'rate' => $validated['rate'],
    //         'total_amount' => $totalAmount,
    //         'status' => $validated['exchange_status'],
    //         'bank_id' => $validated['bank_id'],
    //         'paid_to_seller_bdt' => $paidAmount,
    //         'due_amount' => $dueAmount,
    //         'payment_status' => $paymentStatus,
    //         'npsb_fee' => $validated['bank_transaction_fee'] ?? 0,
    //         'eft_beftn_fee' => $validated['eft_beftn_fee'] ?? 0,
    //         'fixed_currency_fee' => $fixedCurrencyFee,
    //         'percent_currency_fee' => $validated['currency_transaction_fee'] ?? 0,
    //     ]);


    //         // Only create bank transaction if fees are greater than zero
    //     if (($validated['bank_transaction_fee'] ?? 0) > 0 || ($validated['npsb_fee'] ?? 0) > 0) {
    //         $this->createFeeBankTransaction($exchange);
    //     }

    //     return redirect()->route('exchanges.index')->with('success', 'Exchange created successfully.');
    // }

    public function buyDollar()
    {
        $currencies = Currency::all();
        $banks = Bank::all();
        $userTypes = UserType::all();
        $roles = Role::all();
        return view('exchanges.buy', compact('currencies', 'banks', 'userTypes', 'roles'));
    }

    // public function buyDollarStore(Request $request)
    // {
    //    // Validate incoming request data
    //     $validated = $request->validate([
    //         'exchange_type' => 'required|in:buy,sell',
    //         'user_id' => 'required|exists:users,id',
    //         'currency_id' => 'required|exists:currencies,id',
    //         'quantity' => 'required|numeric|min:0.01',
    //         'rate' => 'required|numeric|min:0.01',
    //         'exchange_status' => 'required|in:pending,approved,canceled',
    //         'bank_id' => 'required|exists:banks,id', // Add validation for bank_id
    //         'paid_to_seller_bdt' => 'nullable|numeric|min:0', // Optional field for initial payment
    //         'npsb_fee' => 'nullable|numeric|min:0', // NPSB Fee
    //         'eft_beftn_fee' => 'nullable|numeric|min:0', // EFT/BEFTN Fee
    //         'fixed_currency_fee' => 'nullable|numeric|min:0', // Optional fixed currency fee
    //         'percent_currency_fee' => 'nullable|numeric|min:0', // Optional percentage currency fee
    //         'bank_transaction_fee' => 'nullable|numeric|min:0', // Optional percentage currency fee
    //         'currency_transaction_fee' => 'nullable|numeric|min:0', // Optional percentage currency fee
    //     ]);
    //     $exchange_type = 'buy';

    //     // Apply fees to adjust the quantity
    //     $fixedCurrencyFee = $validated['fixed_currency_fee'] ?? 0;
    //     $percentCurrencyFee = ($validated['currency_transaction_fee'] ?? 0) / 100 * $validated['quantity'];
    //     $adjustedQuantity = $validated['quantity'] - ($fixedCurrencyFee + $percentCurrencyFee);

    //     // Calculate total amount and due amount
    //     $totalAmount = $validated['quantity'] * $validated['rate'];
    //     $paidAmount = $validated['paid_to_seller_bdt'] ?? 0;
    //     $dueAmount = $totalAmount - $paidAmount;

    //     // Determine payment status based on the paid amount
    //     $paymentStatus = 'Due';
    //     if ($paidAmount >= $totalAmount) {
    //         $paymentStatus = 'Paid';
    //     } elseif ($paidAmount > 0) {
    //         $paymentStatus = 'Partial';
    //     }

    //     // Create the exchange with all required fields, including fees
    //     $exchange = Exchange::create([
    //         'exchange_type' => $exchange_type,
    //         'user_id' => $validated['user_id'],
    //         'currency_id' => $validated['currency_id'],
    //         'orginal_quantity' => $validated['quantity'],
    //         'quantity' => $adjustedQuantity, // Use adjusted quantity
    //         'rate' => $validated['rate'],
    //         'total_amount' => $totalAmount,
    //         'status' => $validated['exchange_status'],
    //         'bank_id' => $validated['bank_id'],
    //         'paid_to_seller_bdt' => $paidAmount,
    //         'due_amount' => $dueAmount,
    //         'payment_status' => $paymentStatus,
    //         'npsb_fee' => $validated['bank_transaction_fee'] ?? 0,
    //         'eft_beftn_fee' => $validated['eft_beftn_fee'] ?? 0,
    //         'fixed_currency_fee' => $fixedCurrencyFee,
    //         'percent_currency_fee' => $validated['currency_transaction_fee'] ?? 0,
    //     ]);

    //         // Only create bank transaction if fees are greater than zero
    //     if (($validated['bank_transaction_fee'] ?? 0) > 0 || ($validated['npsb_fee'] ?? 0) > 0) {
    //         $this->createFeeBankTransaction($exchange);
    //     }

    //     return redirect()->route('exchanges.index')->with('success', 'Exchange created successfully.');
    // }
    public function buyDollarStore(Request $request)
    {
        Log::info('buyDollarStore: Request received', $request->all());
        // Validate incoming request data
        $validated = $request->validate([
            'exchange_type' => 'required|in:buy,sell',
            'user_id' => 'required|exists:users,id',
            'currency_id' => 'required|exists:currencies,id',
            'quantity' => 'required|numeric|min:0.01',
            'rate' => 'required|numeric|min:0.01',
            'exchange_status' => 'required|in:pending,approved,canceled',
            'bank_id' => 'required|exists:banks,id', // Add validation for bank_id
            'paid_to_seller_bdt' => 'nullable|numeric|min:0', // Optional field for initial payment
            'npsb_fee' => 'nullable|numeric|min:0', // NPSB Fee
            'eft_beftn_fee' => 'nullable|numeric|min:0', // EFT/BEFTN Fee
            'fixed_currency_fee' => 'nullable|numeric|min:0', // Optional fixed currency fee
            'percent_currency_fee' => 'nullable|numeric|min:0', // Optional percentage currency fee
            'bank_transaction_fee' => 'nullable|numeric|min:0', // Optional bank transaction fee
            'currency_transaction_fee' => 'nullable|numeric|min:0', // Optional currency transaction fee
        ]);

        // Ensure this is a 'buy' exchange type
        $exchange_type = 'buy';

        // Apply fees to adjust the quantity
        $fixedCurrencyFee = $validated['fixed_currency_fee'] ?? 0;
        $percentCurrencyFee = ($validated['currency_transaction_fee'] ?? 0) / 100 * $validated['quantity'];
        $adjustedQuantity = $validated['quantity'] - ($fixedCurrencyFee + $percentCurrencyFee);

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

        try {
            // Create the exchange with all required fields, including fees
            $exchange = Exchange::create([
                'exchange_type' => $exchange_type,
                'user_id' => $validated['user_id'],
                'currency_id' => $validated['currency_id'],
                'orginal_quantity' => $validated['quantity'],
                'quantity' => $adjustedQuantity, // Use adjusted quantity
                'rate' => $validated['rate'],
                'total_amount' => $totalAmount,
                'status' => $validated['exchange_status'],
                'bank_id' => $validated['bank_id'],
                'paid_to_seller_bdt' => $paidAmount,
                'due_amount' => $dueAmount,
                'payment_status' => $paymentStatus,
                'npsb_fee' => $validated['bank_transaction_fee'] ?? 0,
                'eft_beftn_fee' => $validated['eft_beftn_fee'] ?? 0,
                'fixed_currency_fee' => $fixedCurrencyFee,
                'percent_currency_fee' => $validated['currency_transaction_fee'] ?? 0,
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->withErrors('An error occurred while creating the exchange.');
        }

        // Record the purchase in the currency_inventories table (FIFO inventory tracking)
        if ($exchange_type === 'buy') {
            CurrencyInventory::create([
                'currency_id' => $validated['currency_id'],
                'exchange_id' => $exchange->id, // Reference the newly created exchange
                'quantity' => $adjustedQuantity, // The original quantity
                'original_quantity' => $adjustedQuantity, // Save original quantity
                'cost_per_unit' => ($validated['quantity'] * $validated['rate']) / $adjustedQuantity,
                'purchase_date' => now(), // Current timestamp
            ]);
        }

        // Only create bank transaction if fees are greater than zero
        if (($validated['bank_transaction_fee'] ?? 0) > 0 || ($validated['npsb_fee'] ?? 0) > 0) {
            $this->createFeeBankTransaction($exchange);
        }

        return redirect()->route('exchanges.index')->with('success', 'Exchange created successfully.');
    }


    public function sellDollar()
    {
        $currencies = Currency::all();
        $banks = Bank::all();
        $userTypes = UserType::all();
        $roles = Role::all();
        return view('exchanges.sell', compact('currencies', 'banks', 'userTypes', 'roles'));
    }

    // public function sellDollarStore(Request $request)
    // {
    //     // Validate incoming request data
    //     $validated = $request->validate([
    //         'exchange_type' => 'required|in:buy,sell',
    //         'user_id' => 'required|exists:users,id',
    //         'currency_id' => 'required|exists:currencies,id',
    //         'quantity' => 'required|numeric|min:0.01',
    //         'rate' => 'required|numeric|min:0.01',
    //         'exchange_status' => 'required|in:pending,approved,canceled',
    //         'bank_id' => 'required|exists:banks,id', // Add validation for bank_id
    //         'paid_to_seller_bdt' => 'nullable|numeric|min:0', // Optional field for initial payment
    //         'npsb_fee' => 'nullable|numeric|min:0', // NPSB Fee
    //         'eft_beftn_fee' => 'nullable|numeric|min:0', // EFT/BEFTN Fee
    //         'fixed_currency_fee' => 'nullable|numeric|min:0', // Optional fixed currency fee
    //         'percent_currency_fee' => 'nullable|numeric|min:0', // Optional percentage currency fee
    //         'bank_transaction_fee' => 'nullable|numeric|min:0', // Optional percentage currency fee
    //         'currency_transaction_fee' => 'nullable|numeric|min:0', // Optional percentage currency fee
    //     ]);

    //     $exchange_type = 'sell';

    //     // Apply fees to adjust the quantity
    //     $fixedCurrencyFee = $validated['fixed_currency_fee'] ?? 0;
    //     $percentCurrencyFee = ($validated['currency_transaction_fee'] ?? 0) / 100 * $validated['quantity'];

    //     $adjustedQuantity = $validated['quantity'];

    //     // Calculate total amount and due amount
    //     $totalAmount = $validated['quantity'] * $validated['rate'];
    //     $paidAmount = $validated['paid_to_seller_bdt'] ?? 0;
    //     $dueAmount = $totalAmount - $paidAmount;

    //     // Determine payment status based on the paid amount
    //     $paymentStatus = 'Due';
    //     if ($paidAmount >= $totalAmount) {
    //         $paymentStatus = 'Paid';
    //     } elseif ($paidAmount > 0) {
    //         $paymentStatus = 'Partial';
    //     }

    //     // Create the exchange with all required fields, including fees
    //     $exchange = Exchange::create([
    //         'exchange_type' => $exchange_type,
    //         'user_id' => $validated['user_id'],
    //         'currency_id' => $validated['currency_id'],
    //         'orginal_quantity' => $validated['quantity'],
    //         'quantity' => $adjustedQuantity, // Use adjusted quantity
    //         'rate' => $validated['rate'],
    //         'total_amount' => $totalAmount,
    //         'status' => $validated['exchange_status'],
    //         'bank_id' => $validated['bank_id'],
    //         'paid_to_seller_bdt' => $paidAmount,
    //         'due_amount' => $dueAmount,
    //         'payment_status' => $paymentStatus,
    //         'npsb_fee' => $validated['bank_transaction_fee'] ?? 0,
    //         'eft_beftn_fee' => $validated['eft_beftn_fee'] ?? 0,
    //         'fixed_currency_fee' => $fixedCurrencyFee,
    //         'percent_currency_fee' => $validated['currency_transaction_fee'] ?? 0,
    //     ]);


    //     // Only create bank transaction if fees are greater than zero
    //     if (($validated['bank_transaction_fee'] ?? 0) > 0 || ($validated['npsb_fee'] ?? 0) > 0) {
    //         $this->createFeeBankTransaction($exchange);
    //     }

    //     return redirect()->route('exchanges.index')->with('success', 'Exchange created successfully.');
    // }

    public function sellDollarStore(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'exchange_type' => 'required|in:buy,sell',
            'user_id' => 'required|exists:users,id',
            'currency_id' => 'required|exists:currencies,id',
            'quantity' => 'required|numeric|min:0.01',
            'rate' => 'required|numeric|min:0.01',
            'total_amount' => 'nullable|numeric|min:0',
            'exchange_status' => 'required|in:pending,approved,canceled',
            'bank_id' => 'required|exists:banks,id', // Add validation for bank_id
            'paid_to_seller_bdt' => 'nullable|numeric|min:0', // Optional field for initial payment
            'npsb_fee' => 'nullable|numeric|min:0', // NPSB Fee
            'eft_beftn_fee' => 'nullable|numeric|min:0', // EFT/BEFTN Fee
            'fixed_currency_fee' => 'nullable|numeric|min:0', // Optional fixed currency fee
            'percent_currency_fee' => 'nullable|numeric|min:0', // Optional percentage currency fee
            'bank_transaction_fee' => 'nullable|numeric|min:0', // Optional bank transaction fee
            'currency_transaction_fee' => 'nullable|numeric|min:0', // Optional currency transaction fee
        ]);

        $exchange_type = 'sell';

        // Apply fees to adjust the quantity
        $fixedCurrencyFee = $validated['fixed_currency_fee'] ?? 0;
        $percentCurrencyFee = ($validated['currency_transaction_fee'] ?? 0) / 100 * $validated['quantity'];
        $adjustedQuantity = $validated['quantity'];

        // Calculate total amount and due amount
        $totalAmount = $validated['total_amount'];
        $paidAmount = $validated['paid_to_seller_bdt'] ?? 0;
        $dueAmount = $totalAmount - $paidAmount;

        // Determine payment status based on the paid amount
        $paymentStatus = 'Due';
        if ($paidAmount >= $totalAmount) {
            $paymentStatus = 'Paid';
        } elseif ($paidAmount > 0) {
            $paymentStatus = 'Partial';
        }

        // Fetch inventory in FIFO order
        $inventory = CurrencyInventory::where('currency_id', $validated['currency_id'])
            ->orderBy('purchase_date', 'asc')
            ->get();

        // Deduct sold quantity from inventory using FIFO
        $remainingQuantity = $validated['quantity'];
        $totalCost = 0;

        foreach ($inventory as $stock) {
            if ($remainingQuantity <= 0) {
                break;
            }

            if ($stock->quantity <= $remainingQuantity) {
                $totalCost += $stock->quantity * $stock->cost_per_unit;
                $remainingQuantity -= $stock->quantity;
                $stock->quantity = 0; // Set quantity to zero instead of deleting
                $stock->save();
            } else {
                $totalCost += $remainingQuantity * $stock->cost_per_unit;
                $stock->quantity -= $remainingQuantity;
                $stock->save();
                $remainingQuantity = 0;
            }
        }

        // Calculate profit
        $totalRevenue = $validated['quantity'] * $validated['rate']; // Sell quantity * sell rate

        // Adjust total revenue based on currency transaction fee
        if (($validated['currency_transaction_fee'] ?? 0) > 0) {
            $currencyTransactionFee = ($validated['currency_transaction_fee'] / 100) * $totalRevenue;
            $totalRevenue -= $currencyTransactionFee; // Deduct the fee from total revenue
        }

        $profit = $totalRevenue - $totalCost;
        // Adjust profit based on currency transaction fee
        // if (($validated['currency_transaction_fee'] ?? 0) > 0) {
        //     $currencyTransactionFee = ($validated['currency_transaction_fee'] / 100) * $totalRevenue;
        //     $profit -= $currencyTransactionFee;
        // }
        // Create the exchange with all required fields, including fees
        $exchange = Exchange::create([
            'exchange_type' => $exchange_type,
            'user_role' => 'seller',
            'user_id' => $validated['user_id'],
            'currency_id' => $validated['currency_id'],
            'orginal_quantity' => $validated['quantity'],
            'quantity' => $adjustedQuantity, // Use adjusted quantity
            'rate' => $validated['rate'],
            'total_amount' => $totalAmount,
            'status' => $validated['exchange_status'],
            'bank_id' => $validated['bank_id'],
            'paid_to_seller_bdt' => $paidAmount,
            'due_amount' => $dueAmount,
            'payment_status' => $paymentStatus,
            'npsb_fee' => $validated['bank_transaction_fee'] ?? 0,
            'eft_beftn_fee' => $validated['eft_beftn_fee'] ?? 0,
            'fixed_currency_fee' => $fixedCurrencyFee,
            'percent_currency_fee' => $validated['currency_transaction_fee'] ?? 0,
            'profit' => $profit, // Store the calculated profit
        ]);

        // Only create bank transaction if fees are greater than zero
        // if (($validated['bank_transaction_fee'] ?? 0) > 0 || ($validated['npsb_fee'] ?? 0) > 0) {
        //     $this->createFeeBankTransaction($exchange);
        // }

        return redirect()->route('exchanges.index')->with('success', 'Exchange created successfully.');
    }


    public function createFeeBankTransaction($exchange)
    {

        BankTransaction::create([
            'bank_id' => $exchange->bank_id,
            'exchange_id' => $exchange->id,
            'transaction_type' => 'debit',  // You can change this to 'credit' based on your business logic
            'amount' => $exchange->npsb_fee, // Amount of the fee
            'buyer_or_seller_user_id' => $exchange->user_id, // The user associated with the transaction
            'transaction_date' => now(),
            'transaction_description' => 'Transaction Fee for Exchange',
            'transaction_status' => 'completed',
            'transaction_purpose' => 'transaction_fee',  // The specific purpose of the fee transaction
            'created_by_user_id' => auth()->id(),
            'updated_by_user_id' => null,
        ]);
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
            'npsb_fee' => 'nullable|numeric|min:0',
            'eft_beftn_fee' => 'nullable|numeric|min:0',
            'fixed_currency_fee' => 'nullable|numeric|min:0',
            'percent_currency_fee' => 'nullable|numeric|min:0',
        ]);

        $validated['total_amount'] = $validated['quantity'] * $validated['rate'];
        $validated['due_amount'] = max(0, $validated['total_amount'] - ($validated['paid_to_seller_bdt'] ?? 0));

        $exchange->update($validated);

        return redirect()->route('exchanges.index')->with('success', 'Exchange updated successfully.');
    }

    public function destroy(Exchange $exchange)
    {
        $exchange->delete();

        $exchange->updateCurrencyReserve();
        $exchange->updateBankBalance();

        return redirect()->route('exchanges.index')->with('success', 'Exchange deleted successfully.');
    }

    public function completePartialPaymentForm($exchangeId)
    {
        $exchange = Exchange::findOrFail($exchangeId);
        $banks = Bank::all();

        return view('exchanges.payment', compact('exchange', 'banks'));
    }

    public function completePartialPayment(Request $request, $exchangeId)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'additional_payment' => 'required|numeric|min:0.01',
            'bank_id' => 'required|exists:banks,id',
            'exchange_id' => 'nullable|exists:exchanges,id',
            'transaction_type' => 'nullable|in:debit,credit',  // Make it optional
            'buyer_or_seller_user_id' => 'nullable|exists:users,id',
            'notes' => 'nullable|string|max:255',
            'transaction_date' => 'nullable|date',
            'transaction_description' => 'nullable|string|max:255',
            'transaction_status' => 'nullable|in:pending,completed,failed',
            'transaction_purpose' => 'nullable|in:opening_balance,balance_adjustment,transaction_fee,expense,dollar_buy,dollar_sale,withdraw,deposit',
        ]);

        // Find the exchange by ID
        $exchange = Exchange::findOrFail($exchangeId);

        // Calculate remaining due
        $remainingDue = $exchange->total_amount - $exchange->paid_to_seller_bdt;

        // Check if additional payment exceeds the remaining due
        if ($request->additional_payment > $remainingDue) {
            return redirect()->back()->withErrors(['additional_payment' => 'Payment exceeds remaining due amount']);
        }

        // Update paid amount and due amount in Exchange
        $exchange->paid_to_seller_bdt += $request->additional_payment;
        if ($exchange->paid_to_seller_bdt >= $exchange->total_amount) {
            $exchange->payment_status = 'Paid';
            $exchange->due_amount = 0;
        } else {
            $exchange->payment_status = 'Partial';
            $exchange->due_amount = $exchange->total_amount - $exchange->paid_to_seller_bdt;
        }
        $exchange->save();

        // Determine the transaction purpose based on the transaction type
        $transactionPurpose = 'deposit'; // Default purpose
        if ($validated['transaction_type'] === 'debit') {
            $transactionPurpose = 'dollar_buy'; // Debit transactions have 'dollar_buy' purpose
        } elseif ($validated['transaction_type'] === 'credit') {
            $transactionPurpose = 'dollar_sale'; // Credit transactions have 'dollar_sale' purpose
        }

        // Create a new BankTransaction
        try {
            BankTransaction::create([
                'bank_id' => $validated['bank_id'],
                'exchange_id' => $exchange->id,
                'transaction_type' => $validated['transaction_type'] ?: 'debit',  // Default to 'debit' if not provided
                'amount' => $request->additional_payment,
                'buyer_or_seller_user_id' => $exchange->user_id, // Using exchange's user_id
                'transaction_date' => $validated['transaction_date'] ?? now(),
                'transaction_description' => $validated['transaction_description'] ?? 'Additional Payment for Exchange ID ' . $exchange->id,
                'transaction_status' => $validated['transaction_status'] ?? 'completed',
                'transaction_purpose' => $transactionPurpose,  // Use the determined transaction purpose
                'created_by_user_id' => auth()->id(),
                'updated_by_user_id' => null,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Debugging any exceptions during BankTransaction creation
        }
        // Only create bank transaction if fees are greater than zero
        if (($validated['bank_transaction_fee'] ?? 0) > 0 || ($validated['npsb_fee'] ?? 0) > 0) {
            $this->createFeeBankTransaction($exchange);
        }

        return redirect()->route('exchanges.index')->with('success', 'Additional payment recorded and bank transaction completed successfully.');
    }

}