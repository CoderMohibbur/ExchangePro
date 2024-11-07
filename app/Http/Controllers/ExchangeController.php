<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Currency;
use App\Models\Exchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExchangeController extends Controller
{
    public function index(Request $request)
    {
        $query = Exchange::with(['currency', 'user']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('username', 'like', "%{$search}%");
            })
                ->orWhere('id', 'like', "%{$search}%");
        }

        $exchanges = $query->paginate(10);

        return view('exchanges.index', compact('exchanges'));
    }

    public function create()
    {
        $currencies = Currency::all();
        $banks = Bank::all();
        return view('exchanges.create', compact('currencies', 'banks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'exchange_type' => 'required|in:buy,sell',
            'user_id' => 'required|exists:users,id',
            'currency_id' => 'required|exists:currencies,id',
            'quantity' => 'required|numeric|min:0.01',
            'rate' => 'required|numeric|min:0.01',
            'status' => 'required|in:pending,approved,canceled',
        ]);

        // Additional calculations can be done here if needed
        $total_amount = $validated['quantity'] * $validated['rate'];

        Exchange::create([
            'exchange_type' => $validated['exchange_type'],
            'user_id' => $validated['user_id'],
            'currency_id' => $validated['currency_id'],
            'quantity' => $validated['quantity'],
            'rate' => $validated['rate'],
            'total_amount' => $total_amount,
            'status' => $validated['status'],
        ]);

        return redirect()->route('exchanges.index')->with('success', 'Exchange created successfully.');
    }


    public function show(Exchange $exchange)
    {
        return view('exchanges.show', compact('exchange'));
    }

    public function edit(Exchange $exchange)
    {
        $currencies = Currency::all();
        $banks = Bank::all();
        return view('exchanges.edit', compact('exchange', 'currencies', 'banks'));
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
            'bank_id' => 'required|exists:banks,id',
            'status' => 'required|in:pending,approved,canceled',
        ]);

        $validated['total_amount'] = $validated['quantity'] * $validated['rate'];
        $validated['due_amount'] = max(0, $validated['total_amount'] - ($validated['paid_to_seller_bdt'] ?? 0));

        $exchange->update($validated);

        return redirect()->route('exchanges.index')->with('success', 'Exchange updated successfully');
    }

    public function destroy(Exchange $exchange)
    {
        $exchange->delete();
        return redirect()->route('exchanges.index')->with('success', 'Exchange deleted successfully');
    }
}
