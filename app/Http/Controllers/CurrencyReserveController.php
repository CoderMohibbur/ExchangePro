<?php

namespace App\Http\Controllers;

use App\Models\CurrencyReserve;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyReserveController extends Controller
{
    /**
     * Display a listing of currency reserves.
     */

    // Example in the index method of your controller
    public function index()
    {
        $currencyReserves = CurrencyReserve::with('currency')->paginate(10);
        return view('currency_reserve.index', compact('currencyReserves'));
    }


    /**
     * Show the form for creating a new currency reserve.
     */
    public function create()
    {
        $currencies = Currency::all();
        return view('currency_reserve.create', compact('currencies'));
    }

    /**
     * Store a newly created currency reserve in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'currency_id' => 'required|exists:currencies,id',
            'balance' => 'required|numeric',
        ]);

        CurrencyReserve::create($validated);

        return redirect()->route('currency_reserve.index')
            ->with('success', 'Currency Reserve created successfully.');
    }

    /**
     * Display the specified currency reserve.
     */
    public function show(CurrencyReserve $currencyReserve)
    {
        return view('currency_reserve.show', compact('currencyReserve'));
    }

    /**
     * Show the form for editing the specified currency reserve.
     */
    public function edit(CurrencyReserve $currencyReserve)
    {
        $currencies = Currency::all();
        return view('currency_reserve.edit', compact('currencyReserve', 'currencies'));
    }

    /**
     * Update the specified currency reserve in storage.
     */
    public function update(Request $request, CurrencyReserve $currencyReserve)
    {
        $validated = $request->validate([
            'currency_id' => 'required|exists:currencies,id',
            'balance' => 'required|numeric',
        ]);

        $currencyReserve->update($validated);

        return redirect()->route('currency_reserve.index')->with('success', 'Currency reserve updated successfully.');
    }

    /**
     * Remove the specified currency reserve from storage.
     */
    public function destroy(CurrencyReserve $currencyReserve)
    {
        $currencyReserve->delete();

        return redirect()->route('currency_reserve.index')
            ->with('success', 'Currency Reserve deleted successfully.');
    }

    /**
     * Increment or decrement the balance of a currency reserve.
     */
    public function adjustBalance(Request $request, CurrencyReserve $currencyReserve)
    {
        $validated = $request->validate([
            'adjustment_type' => 'required|in:credit,debit',
            'amount' => 'required|numeric|min:0.01',
        ]);

        try {
            // Calculate new balance based on adjustment type
            $newBalance = $validated['adjustment_type'] === 'credit'
                ? $currencyReserve->balance + $validated['amount']
                : $currencyReserve->balance - $validated['amount'];

            // Ensure balance doesn’t go negative
            if ($newBalance < 0) {
                return redirect()->back()->withErrors('Adjustment would result in a negative balance.');
            }

            // Update the currency reserve balance
            $currencyReserve->update(['balance' => $newBalance]);

            // Optionally log the adjustment in currency reserve transactions
            $currencyReserve->transactions()->create([
                'currency_id' => $currencyReserve->currency_id,
                'transaction_type' => $validated['adjustment_type'],
                'amount' => $validated['amount'],
                'balance_before' => $currencyReserve->balance,
                'balance_after' => $newBalance,
                'notes' => $request->input('notes', ''),
            ]);

            return redirect()->route('currency_reserves.index')->with('success', 'Balance adjusted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to adjust balance: ' . $e->getMessage());
        }
    }
}
