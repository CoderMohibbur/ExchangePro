<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the currencies.
     */
    public function index()
    {
        $currencies = Currency::paginate(10); // Pagination for easier viewing
        return view('currencies.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new currency.
     */
    public function create()
    {
        return view('currencies.create');
    }

    /**
     * Store a newly created currency in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:currencies,name|max:255',
            'code' => 'required|string|unique:currencies,code|max:10',
            'exchange_rate' => 'required|numeric|min:0',
        ]);

        Currency::create($validated);

        return redirect()->route('currencies.index')->with('success', 'Currency added successfully');
    }

    /**
     * Show the form for editing the specified currency.
     */
    public function edit(Currency $currency)
    {
        return view('currencies.edit', compact('currency'));
    }

    /**
     * Update the specified currency in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:currencies,name,' . $currency->id . '|max:255',
            'code' => 'required|string|unique:currencies,code,' . $currency->id . '|max:10',
            'exchange_rate' => 'required|numeric|min:0',
        ]);

        $currency->update($validated);

        return redirect()->route('currencies.index')->with('success', 'Currency updated successfully');
    }

    /**
     * Remove the specified currency from storage.
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        return redirect()->route('currencies.index')->with('success', 'Currency deleted successfully');
    }
}
