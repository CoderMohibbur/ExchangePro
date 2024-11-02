<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankBalance;
use Illuminate\Http\Request;

class BankBalanceController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $balances = BankBalance::with('bank')
        ->when($search, function ($query, $search) {
            $query->whereHas('bank', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhere('transaction_id', 'like', "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString();

    return view('bank_balances.index', compact('balances', 'search'));
}


    public function create()
    {
        $banks = Bank::all();
        return view('bank_balances.create', compact('banks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'amount' => 'required|numeric',
            'transaction_id' => 'nullable|string',
        ]);

        BankBalance::create($request->only('bank_id', 'amount', 'transaction_id'));

        return redirect()->route('bank_balances.index')->with('success', 'Balance entry added successfully.');
    }

    public function edit(BankBalance $bankBalance)
    {
        $banks = Bank::all();
        return view('bank_balances.edit', compact('bankBalance', 'banks'));
    }

    public function update(Request $request, BankBalance $bankBalance)
    {
        $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'amount' => 'required|numeric',
            'transaction_id' => 'nullable|string',
        ]);

        $bankBalance->update($request->only('bank_id', 'amount', 'transaction_id'));

        return redirect()->route('bank_balances.index')->with('success', 'Balance entry updated successfully.');
    }

    public function destroy(BankBalance $bankBalance)
    {
        $bankBalance->delete();

        return redirect()->route('bank_balances.index')->with('success', 'Balance entry deleted successfully.');
    }
}
