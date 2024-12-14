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
        $banks = Bank::paginate(10); // Adjust the pagination number as needed
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

    public function getFees($bankId)
    {
        $bank = Bank::find($bankId);
        return response()->json([
            'npsb_fee' => $bank->npsb_fee,
            'eft_beftn_fee' => $bank->eft_beftn_fee,
        ]);
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
    $today = Carbon::today();
    $thisMonth = Carbon::now()->month;
    $thisYear = Carbon::now()->year;

    // Retrieve the bank data
    $bank = Bank::findOrFail($id);

    // Get the sum of all-time credits (deposits)
    $totalCreditsAllTime = $bank->transactions()
        ->where('transaction_type', 'credit')
        ->sum('amount');

    // Get the sum of all-time debits (withdrawals)
    $totalDebitsAllTime = $bank->transactions()
        ->where('transaction_type', 'debit')
        ->sum('amount');

    // Calculate the net total balance (all-time credits - all-time debits)
    $netTotalBalance = $totalCreditsAllTime - $totalDebitsAllTime;

    // Get the sum of debits for the current month (debits where npsb is not 1 or npsb = 0)
    $bankToBankMonth = $bank->transactions()
        ->where('transaction_type', 'debit')
        ->whereMonth('created_at', $thisMonth)
        ->whereYear('created_at', $thisYear)
        ->where('npsb', 0) // where npsb is 0 or not 1
        ->sum('amount');

    // Get the sum of credits for the current month
    $totalCreditsMonth = $bank->transactions()
        ->where('transaction_type', 'credit')
        ->whereMonth('created_at', $thisMonth)
        ->whereYear('created_at', $thisYear)
        ->sum('amount');

    // Get the sum of debits for the current month where npsb is 1
    $npsbThisMonth = $bank->transactions()
        ->where('transaction_type', 'debit')
        ->whereMonth('created_at', $thisMonth)
        ->whereYear('created_at', $thisYear)
        ->where('npsb', 1) // npsb is 1
        ->sum('amount');

    // Get the sum of debits for today where npsb is not 1 or npsb = 0
    $bankToBankToday = $bank->transactions()
        ->where('transaction_type', 'debit')
        ->whereDate('created_at', $today)
        ->where('npsb', 0) // where npsb is 0 or not 1
        ->sum('amount');

    // Get the sum of debits for today where npsb is 1
    $npsbToday = $bank->transactions()
        ->where('transaction_type', 'debit')
        ->whereDate('created_at', $today)
        ->where('npsb', 1) // npsb is 1
        ->sum('amount');

    // Get the sum of debits for today where npsb is 1 (This Month)
    $npsbThisMonthTotal = $bank->transactions()
        ->where('transaction_type', 'debit')
        ->whereDate('created_at', $today)
        ->where('npsb', 1) // npsb is 1
        ->sum('amount');

    // Retrieve all transactions for the bank (for display in the table)
    $transactions = $bank->transactions()->latest()->paginate(10);

    // Return the view with the data
    return view('banks.show', compact(
        'bank',
        'transactions',
        'netTotalBalance',
        'bankToBankMonth',
        'npsbThisMonth',
        'bankToBankToday',
        'npsbToday',  // Added npsbToday
        'npsbThisMonthTotal',
        'totalCreditsMonth',
    ));
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


        BankTransaction::create([
            'bank_id' => $bank->id,
            'transaction_type' => 'debit',
            'amount' => $withdrawAmount,
            'transaction_description' => $request->transaction_description ?? 'Bank Withdraw',
            'transaction_date' => $transactionDate,  // Use the formatted date
            'transaction_purpose' => 'withdraw',  // Use the formatted date
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
            'transaction_description' => 'nullable|string|max:255',  // Validate transaction description is optional and a string
        ]);

        $bank = Bank::findOrFail($bankId);
        $depositAmount = $request->amount;

        // Get transaction date, default to current date if not provided
        $transactionDate = $request->transaction_date
            ? Carbon::createFromFormat('d/m/Y', $request->transaction_date)->format('Y-m-d')  // Convert to 'YYYY-MM-DD'
            : now()->format('Y-m-d');  // Use current date if not provided

        // Record the transaction in BankTransaction model
        $bank->transactions()->create([
            'transaction_type' => 'credit', // Deposit is a credit transaction
            'amount' => $depositAmount,
            'transaction_description' => $request->transaction_description ?? 'Bank Deposit',
            'transaction_date' => $transactionDate,  // Use the formatted date
            'transaction_purpose' => 'deposit',  // Use the formatted date
            'created_by_user_id' => auth()->id(),
        ]);

        return redirect()->route('banks.index')->with('success', 'Deposit completed successfully.');
    }


}