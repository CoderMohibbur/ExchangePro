<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'currency'])->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $users = User::all();
        $currencies = Currency::all();
        return view('transactions.create', compact('users', 'currencies'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'currency_id' => 'required|exists:currencies,id',
            'amount' => 'required|numeric',
            'transaction_type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Transaction::create($request->only('user_id', 'currency_id', 'amount', 'transaction_type', 'description'));

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }


    public function edit(Transaction $transaction)
    {
        $currencies = Currency::all();
        $users = User::all();
        return view('transactions.edit', compact('transaction', 'currencies', 'users'));
    }

    public function update(Request $request, Transaction $transaction)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'currency_id' => 'required|exists:currencies,id',
        'amount' => 'required|numeric',
        'transaction_type' => 'required|in:credit,debit', // Specify types
        'description' => 'nullable|string',
        'transaction_date' => 'nullable|date',
    ]);

    $transaction->update($request->only('user_id', 'currency_id', 'amount', 'transaction_type', 'description', 'transaction_date'));

    return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
}


    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
