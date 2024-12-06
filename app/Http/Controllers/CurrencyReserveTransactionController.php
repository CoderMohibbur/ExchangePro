<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\CurrencyReserve;
use App\Models\CurrencyReserveTransaction;

class CurrencyReserveTransactionController extends Controller
{
    /**
     * Display a listing of the currency reserve transactions.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $transactions = CurrencyReserveTransaction::with(['currency', 'user'])
            ->when($search, function ($query, $search) {
                $query->whereHas('currency', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('code', 'like', "%{$search}%");
                })->orWhere('transaction_type', 'like', "%{$search}%")
                    ->orWhere('amount', 'like', "%{$search}%")
                    ->orWhere('reference', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString();

        return view('currency_reserve_transactions.index', compact('transactions', 'search'));
    }

    /**
     * Show the form for creating a new currency reserve transaction.
     */
    public function create()
    {
        $currencies = Currency::all();
        return view('currency_reserve_transactions.create', compact('currencies'));
    }

    /**
     * Store a newly created currency reserve transaction in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'currency_id' => 'required|exists:currencies,id',
            'transaction_type' => 'required|in:debit,credit',
            'amount' => 'required|numeric|min:0',
            'user_id' => 'nullable|exists:users,id',
            'user_role' => 'nullable|in:buyer,seller',
            'reference' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'transaction_date' => 'nullable|date',
        ]);

        try {
            // Check if a reserve entry for the currency already exists
            $currencyReserve = CurrencyReserve::firstOrCreate(
                ['currency_id' => $validated['currency_id']],
                ['balance' => 0]  // Initialize balance if creating a new entry
            );

            $balanceBefore = $currencyReserve->balance;

            // Calculate balance after the transaction based on type
            $balanceAfter = $validated['transaction_type'] === 'credit'
                ? $balanceBefore + $validated['amount']
                : $balanceBefore - $validated['amount'];

            // Add balance fields to validated data
            $validated['balance_before'] = $balanceBefore;
            $validated['balance_after'] = $balanceAfter;

            // Save the transaction
            CurrencyReserveTransaction::create($validated);

            // Update the currency reserve balance
            $currencyReserve->update(['balance' => $balanceAfter]);

            return redirect()->route('currency_reserve_transactions.index')->with('success', 'Transaction recorded successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to create transaction: ' . $e->getMessage())->withInput();
        }
    }



    /**
     * Show the form for editing the specified currency reserve transaction.
     */
    public function edit(CurrencyReserveTransaction $currencyReserveTransaction)
    {
        $currencies = Currency::all();
        return view('currency_reserve_transactions.edit', compact('currencyReserveTransaction', 'currencies'));
    }

    /**
     * Update the specified currency reserve transaction in storage.
     */
    public function update(Request $request, CurrencyReserveTransaction $currencyReserveTransaction)
    {
        $validated = $request->validate([
            'currency_id' => 'required|exists:currencies,id',
            'transaction_type' => 'required|in:debit,credit',
            'amount' => 'required|numeric|min:0',
            'user_id' => 'nullable|exists:users,id',
            'user_role' => 'nullable|in:buyer,seller',
            'reference' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'transaction_date' => 'nullable|date',
        ]);

        try {
            // Fetch the related currency reserve and calculate balance changes
            $currencyReserve = CurrencyReserve::where('currency_id', $validated['currency_id'])->firstOrFail();

            // Calculate old and new balances
            $balanceBeforeUpdate = $currencyReserveTransaction->balance_before;
            $balanceAfterUpdate = $currencyReserveTransaction->balance_after;

            // Calculate the new balance after the update
            $newBalanceBefore = $currencyReserve->balance;

            $newBalanceAfter = $validated['transaction_type'] === 'credit'
                ? $newBalanceBefore + $validated['amount']
                : $newBalanceBefore - $validated['amount'];

            // Update currency reserve balance
            $currencyReserve->update(['balance' => $newBalanceAfter]);

            // Update transaction data and add balances
            $currencyReserveTransaction->update(array_merge($validated, [
                'balance_before' => $newBalanceBefore,
                'balance_after' => $newBalanceAfter,
            ]));

            return redirect()->route('currency_reserve_transactions.index')->with('success', 'Transaction updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to update transaction: ' . $e->getMessage())->withInput();
        }
    }


    /**
     * Remove the specified currency reserve transaction from storage.
     */
    public function destroy(CurrencyReserveTransaction $currencyReserveTransaction)
    {
        try {
            // Fetch the related currency reserve
            $currencyReserve = CurrencyReserve::where('currency_id', $currencyReserveTransaction->currency_id)->firstOrFail();

            // Adjust the balance in currency reserve based on transaction type
            $adjustedBalance = $currencyReserveTransaction->transaction_type === 'credit'
                ? $currencyReserve->balance - $currencyReserveTransaction->amount
                : $currencyReserve->balance + $currencyReserveTransaction->amount;

            $currencyReserve->update(['balance' => $adjustedBalance]);

            // Delete the transaction
            $currencyReserveTransaction->delete();

            return redirect()->route('currency_reserve_transactions.index')->with('error', 'Transaction deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to delete transaction: ' . $e->getMessage());
        }
    }

}