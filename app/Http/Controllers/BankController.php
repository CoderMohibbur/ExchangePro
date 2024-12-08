<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bank;
use Illuminate\Http\Request;
use App\Models\BankTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for the logo
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Store the image in the 'public/bank_logos' directory
            $logoPath = $request->file('logo')->store('bank_logos', 'public');
        } else {
            $logoPath = null;
        }

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
        ]) + ['logo' => $logoPath]);  // Add the logo path

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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for the logo
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($bank->logo) {
                Storage::disk('public')->delete('bank_logos/' . $bank->logo);
            }

            // Store the new logo image in the 'public/bank_logos' directory
            $logoPath = $request->file('logo')->store('bank_logos', 'public');
        } else {
            // If no new logo is uploaded, keep the old one
            $logoPath = $bank->logo;
        }

        // Update the bank record with all fields, including the logo path
        $bank->update($request->only([
            'name',
            'beneficiary_name',
            'account_number',
            'account_type',
            'routing',
            'bank_address',
            'npsb_fee',
            'eft_beftn_fee',
            'balance',
        ]) + ['logo' => $logoPath]);  // Add the logo path

        return redirect()->route('banks.index')->with('success', 'Bank updated successfully.');
    }

    public function show($id)
    {
        // Retrieve the bank data
        $bank = Bank::findOrFail($id);

        // Get the current month and year for filtering
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Get the sum of debits for the current month
        $totalDebitsMonth = $bank->transactions()
            ->where('transaction_type', 'debit')
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->sum('amount');

        // Get the sum of credits for the current month
        $totalCreditsMonth = $bank->transactions()
            ->where('transaction_type', 'credit')
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->sum('amount');

        // Get the sum of debits for the current year
        $totalDebitsYear = $bank->transactions()
            ->where('transaction_type', 'debit')
            ->whereYear('created_at', $currentYear)
            ->sum('amount');

        // Get the sum of credits for the current year
        $totalCreditsYear = $bank->transactions()
            ->where('transaction_type', 'credit')
            ->whereYear('created_at', $currentYear)
            ->sum('amount');

        // Get the sum of all-time debits
        $totalDebitsAllTime = $bank->transactions()
            ->where('transaction_type', 'debit')
            ->sum('amount');

        // Get the sum of all-time credits
        $totalCreditsAllTime = $bank->transactions()
            ->where('transaction_type', 'credit')
            ->sum('amount');

        // Calculate the net total balance (debits - credits)
        $netTotalBalance = $totalDebitsAllTime - $totalCreditsAllTime;

        // Retrieve all transactions for the bank (for display in the table)
        $transactions = $bank->transactions()->latest()->paginate(10);

        // Return the view with the data
        return view('banks.show', compact('bank', 'transactions', 'totalDebitsMonth', 'totalCreditsMonth', 'totalDebitsYear', 'totalCreditsYear', 'netTotalBalance'));
    }

    

    public function destroy(Bank $bank)
    {
        // Check if there are any transactions related to this bank
        if ($bank->transactions()->exists()) {
            // If there are transactions, prevent deletion and show a message
            return redirect()->route('banks.index')->with('error', 'This bank cannot be deleted because it has related transactions.');
        }

        // If no transactions are found, proceed with the deletion
        $bank->delete();

        // Redirect back with success message
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
            'transaction_date' => 'nullable|date_format:d/m/Y|before_or_equal:today',  // Validate date format (DD/MM/YYYY)
        ]);

        $withdrawAmount = $request->amount;

        // Get transaction date, default to current date if not provided
        $transactionDate = $request->transaction_date
            ? Carbon::createFromFormat('d/m/Y', $request->transaction_date)->format('Y-m-d')  // Convert to 'YYYY-MM-DD'
            : now()->format('Y-m-d');  // Use current date if not provided

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
            'transaction_date' => $transactionDate,  // Use the formatted date
            'created_by_user_id' => Auth::id(),
        ]);

        return redirect()->route('banks.index')->with('success', 'Amount withdrawn successfully.');
    }


    public function depositForm($bankId)
    {
        $bank = Bank::findOrFail($bankId);
        return view('banks.deposit', compact('bank'));
    }

    public function processDeposit(Request $request, $bankId)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'transaction_date' => 'nullable|date_format:d/m/Y|before_or_equal:today',  // Validate date format (DD/MM/YYYY)
        ]);

        $bank = Bank::findOrFail($bankId);
        $depositAmount = $request->amount;

        // Get transaction date, default to current date if not provided
        $transactionDate = $request->transaction_date
            ? Carbon::createFromFormat('d/m/Y', $request->transaction_date)->format('Y-m-d')  // Convert to 'YYYY-MM-DD'
            : now()->format('Y-m-d');  // Use current date if not provided

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
            'transaction_date' => $transactionDate,  // Use the formatted date
            'created_by_user_id' => auth()->id(),
        ]);

        return redirect()->route('banks.index')->with('success', 'Deposit completed successfully.');
    }


}