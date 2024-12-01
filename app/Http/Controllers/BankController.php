<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Models\BankTransaction;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::with('balances')->paginate(10); // Adjust the pagination number as needed
        return view('banks.index', compact('banks'));
    }

    public function create()
    {
        return view('banks.create');
    }

    public function store(Request $request)
    {
        // Validate the input fields, including the new ones
        $request->validate([
            'name' => 'required|string|unique:banks,name',
            'beneficiary_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255|unique:banks,account_number',
            'account_type' => 'required|string|max:255',
            'routing' => 'required|string|max:255',
            'bank_address' => 'required|string|max:255',
            'npsb_fee' => 'nullable|numeric',
            'eft_beftn_fee' => 'nullable|numeric',
            'balance' => 'nullable|numeric',
        ]);

        // Create a new bank with all fields
        Bank::create($request->only([
            'name',
            'beneficiary_name',
            'account_number',
            'account_type',
            'routing',
            'bank_address',
            'npsb_fee',
            'eft_beftn_fee',
            'balance'
        ]));

        return redirect()->route('banks.index')->with('success', 'Bank added successfully.');
    }

    public function edit(Bank $bank)
    {
        return view('banks.edit', compact('bank'));
    }

    public function update(Request $request, Bank $bank)
    {
        // Validate the input fields, including the new ones
        $request->validate([
            'name' => 'required|string|unique:banks,name,' . $bank->id,
            'beneficiary_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255|unique:banks,account_number,' . $bank->id,
            'account_type' => 'required|string|max:255',
            'routing' => 'required|string|max:255',
            'bank_address' => 'required|string|max:255',
            'npsb_fee' => 'nullable|numeric',
            'eft_beftn_fee' => 'nullable|numeric',
            'balance' => 'nullable|numeric',
        ]);

        // Update the bank record with all fields
        $bank->update($request->only([
            'name',
            'beneficiary_name',
            'account_number',
            'account_type',
            'routing',
            'bank_address',
            'npsb_fee',
            'eft_beftn_fee',
            'balance'
        ]));

        return redirect()->route('banks.index')->with('success', 'Bank updated successfully.');
    }

    public function show($id)
    {
        // ব্যাংক ডাটাকে খুঁজে বের করুন
        $bank = Bank::findOrFail($id);

        // শো ব্লেডের জন্য ব্যাংক ডেটা পাঠান
        return view('banks.show', compact('bank'));
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();

        return redirect()->route('banks.index')->with('success', 'Bank deleted successfully.');
    }

    public function showWithdrawForm(Bank $bank)
    {
        return view('banks.withdraw', compact('bank'));
    }

    public function processWithdraw(Request $request, Bank $bank)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'notes' => 'nullable|string|max:255',
            'transaction_date' => 'nullable|date|before_or_equal:today',  // Ensure valid date input
        ]);

        $withdrawAmount = $request->amount;
        $transactionDate = $request->transaction_date ?? now();  // Use the provided date or the current date if none is provided

        // Check if the bank has sufficient balance
        if ($bank->balance < $withdrawAmount) {
            return redirect()->back()->withErrors(['amount' => 'Insufficient balance in the bank account.']);
        }

        // Record the transaction
        $bankBalanceBefore = $bank->balance;
        $bank->balance -= $withdrawAmount;
        $bank->save();

        BankTransaction::create([
            'bank_id' => $bank->id,
            'transaction_type' => 'debit',
            'amount' => $withdrawAmount,
            'balance_before' => $bankBalanceBefore,
            'balance_after' => $bank->balance,
            'notes' => $request->notes ?? 'Withdraw transaction',
            'transaction_date' => $transactionDate,
            'created_by_user_id' => Auth::id(),
        ]);

        return redirect()->route('banks.index')->with('success', 'Amount withdrawn successfully.');
    }

    public function depositForm($bankId)
    {
        $bank = Bank::findOrFail($bankId);
        return view('banks.deposit', compact('bank'));
    }

    // Process the deposit
    public function processDeposit(Request $request, $bankId)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'transaction_date' => 'nullable|date|before_or_equal:today',  // Ensure valid date input
        ]);

        $bank = Bank::findOrFail($bankId);
        $depositAmount = $request->amount;

        // Get transaction date, default to current date if not provided
        $transactionDate = $request->transaction_date ?? now();  // Use the provided date or current date

        // Update bank balance
        $bank->balance += $depositAmount;
        $bank->save();

        // Record the transaction in BankTransaction model
        $bank->transactions()->create([
            'transaction_type' => 'credit', // Deposit is a credit transaction
            'amount' => $depositAmount,
            'balance_before' => $bank->balance - $depositAmount,
            'balance_after' => $bank->balance,
            'notes' => $request->notes ?? 'Deposit transaction',
            'transaction_date' => $transactionDate,
            'created_by_user_id' => auth()->id(),
        ]);

        return redirect()->route('banks.index')->with('success', 'Deposit completed successfully.');
    }

}