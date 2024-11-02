<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Exchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExchangeController extends Controller
{
    public function index()
    {
        $exchanges = Exchange::with(['currency', 'user'])->paginate(10);
        return view('exchanges.index', compact('exchanges'));
    }
    

    public function create()
    {
        $currencies = Currency::all();
        return view('exchanges.create', compact('currencies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'exchange_type' => 'required|in:buy,sell',
            'seller_name' => 'required_if:exchange_type,buy',
            'buyer_name' => 'required_if:exchange_type,sell',
            'currency_id' => 'required|exists:currencies,id',
            'quantity' => 'required|numeric',
            'rate' => 'required|numeric',
            'paid_to_seller_bdt' => 'nullable|numeric',
            'status' => 'required|in:pending,approved,canceled',
        ]);
    
        // Add authenticated user's ID
        $validated['user_id'] = Auth::id();
    
        Exchange::create($validated);
    
        return redirect()->route('exchanges.index')->with('success', 'Exchange created successfully');
    }

    public function show(Exchange $exchange)
    {
        return view('exchanges.show', compact('exchange'));
    }

    public function edit(Exchange $exchange)
    {
        $currencies = Currency::all();
        return view('exchanges.edit', compact('exchange', 'currencies'));
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
            'status' => 'required|in:pending,approved,canceled',
        ]);

        $exchange->update($validated);

        return redirect()->route('exchanges.index')->with('success', 'Exchange updated successfully');
    }

    public function destroy(Exchange $exchange)
    {
        $exchange->delete();
        return redirect()->route('exchanges.index')->with('success', 'Exchange deleted successfully');
    }
}
