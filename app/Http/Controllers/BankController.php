<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

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
        $request->validate([
            'name' => 'required|string|unique:banks,name',
        ]);

        Bank::create($request->only('name'));

        return redirect()->route('banks.index')->with('success', 'Bank added successfully.');
    }

    public function edit(Bank $bank)
    {
        return view('banks.edit', compact('bank'));
    }

    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'name' => 'required|string|unique:banks,name,' . $bank->id,
        ]);

        $bank->update($request->only('name'));

        return redirect()->route('banks.index')->with('success', 'Bank updated successfully.');
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();

        return redirect()->route('banks.index')->with('success', 'Bank deleted successfully.');
    }
}

