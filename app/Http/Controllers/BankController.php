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
        $request->validate([
            'name' => 'required|string|unique:banks,name',
        ]);

        Bank::create($request->only('name'));

        return redirect()->route('banks.index')->with('success', 'Bank added successfully.');
    }

    public function edit(Bank $bank)
    {
        return view('banks.edit', compact('bank'));
    }

    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'name' => 'required|string|unique:banks,name,' . $bank->id,
        ]);

        $bank->update($request->only('name'));

        return redirect()->route('banks.index')->with('success', 'Bank updated successfully.');
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
        ]);

        $withdrawAmount = $request->amount;

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
            'notes' => $request->notes,
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
        ]);

        $bank = Bank::findOrFail($bankId);
        $depositAmount = $request->amount;

        // Update bank balance
        $bank->balance += $depositAmount;
        $bank->save();

        // Record the transaction in BankTransaction model
        $bank->transactions()->create([
            'transaction_type' => 'credit', // Deposit is a credit transaction
            'amount' => $depositAmount,
            'balance_before' => $bank->balance - $depositAmount,
            'balance_after' => $bank->balance,
            'notes' => 'Deposit transaction',
            'created_by_user_id' => auth()->id(),
        ]);

        return redirect()->route('banks.index')->with('success', 'Deposit completed successfully.');
    }
}