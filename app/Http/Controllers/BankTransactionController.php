<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankTransactionController extends Controller
{
    /**
     * Display a listing of the bank transactions.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $transactions = BankTransaction::with('bank')
            ->when($search, function ($query, $search) {
                $query->whereHas('bank', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhere('notes', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString();

        return view('bank_transactions.index', compact('transactions', 'search'));
    }

    /**
     * Show the form for creating a new bank transaction.
     */
    public function create()
    {
        $banks = Bank::all();
        return view('bank_transactions.create', compact('banks'));
    }

    /**
     * Store a newly created bank transaction in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'exchange_id' => 'nullable|exists:exchanges,id',
            'transaction_type' => 'required|in:debit,credit',
            'amount' => 'required|numeric|min:0',
            'buyer_or_seller_user_id' => 'nullable|exists:users,id',
            'notes' => 'nullable|string|max:255',
        ]);

        $validated['created_by_user_id'] = Auth::id();

        BankTransaction::create($validated);

        return redirect()->route('bank_transactions.index')->with('success', 'Transaction recorded successfully.');
    }

    /**
     * Show the form for editing the specified bank transaction.
     */
    public function edit(BankTransaction $bankTransaction)
    {
        $banks = Bank::all();
        return view('bank_transactions.edit', compact('bankTransaction', 'banks'));
    }

    /**
     * Update the specified bank transaction in storage.
     */
    public function update(Request $request, BankTransaction $bankTransaction)
    {
        $validated = $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'exchange_id' => 'nullable|exists:exchanges,id',
            'transaction_type' => 'required|in:debit,credit',
            'amount' => 'required|numeric|min:0',
            'buyer_or_seller_user_id' => 'nullable|exists:users,id',
            'notes' => 'nullable|string|max:255',
        ]);

        // Update the transaction data
        $bankTransaction->update($validated);

        return redirect()->route('bank_transactions.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Display the specified bank transaction.
     */
    public function show(BankTransaction $bankTransaction)
    {
        return view('bank_transactions.show', compact('bankTransaction'));
    }

    /**
     * Remove the specified bank transaction from storage.
     */
    public function destroy(BankTransaction $bankTransaction)
    {
        $bankTransaction->delete();

        return redirect()->route('bank_transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
