<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\CurrencyReserve;
use App\Models\CurrencyTransaction;
use Illuminate\Support\Facades\Auth;

class CurrencyTransactionController extends Controller
{
    /**
     * Display a listing of the currency reserve transactions.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $transactions = CurrencyTransaction::with(['currency', 'user'])
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

        return view('currency_transactions.index', compact('transactions', 'search'));
    }

    /**
     * Show the form for creating a new currency reserve transaction.
     */
    public function create()
    {
        $currencies = Currency::all();
        return view('currency_transactions.create', compact('currencies'));
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
            'transaction_description' => 'nullable|string|max:255',
            'transaction_date' => 'nullable|date',
            'transaction_status' => 'nullable|in:pending,completed,failed',
            'transaction_purpose' => 'nullable|in:expense,balance_adjustment,opening_balance,transaction_fee,withdraw,deposit',
        ]);

        try {
            // Create the currency transaction
            CurrencyTransaction::create([
                'currency_id' => $request->currency_id,
                'transaction_type' => $request->transaction_type,
                'amount' => $request->amount,
                'user_id' => $request->user_id,
                'user_role' => $request->user_role,
                'reference' => $request->reference,
                'transaction_description' => $request->transaction_description,
                'transaction_date' => $request->transaction_date ?? now(),
                'transaction_status' => $request->transaction_status,
                'transaction_purpose' => $request->transaction_purpose,
                'created_by' => Auth::id(),
            ]);

            return redirect()->route('currency_transactions.index')->with('success', 'Transaction recorded successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to create transaction: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Show the form for editing the specified currency reserve transaction.
     */
    public function edit(CurrencyTransaction $currencyTransaction)
    {
        // Fetch all currencies
        $currencies = Currency::all();
        
        // Pass the currencyTransaction and currencies variables to the view
        return view('currency_transactions.edit', compact('currencyTransaction', 'currencies'));
    }
    
    /**
     * Update the specified currency reserve transaction in storage.
     */
    public function update(Request $request, CurrencyTransaction $currencyTransaction)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'currency_id' => 'required|exists:currencies,id',
            'transaction_type' => 'required|in:debit,credit',
            'amount' => 'required|numeric|min:0',
            'user_id' => 'nullable|exists:users,id',
            'user_role' => 'nullable|in:buyer,seller',
            'reference' => 'nullable|string|max:255',
            'transaction_description' => 'nullable|string|max:255',
            'transaction_date' => 'nullable|date',
            'transaction_status' => 'nullable|in:pending,completed,failed',
            'transaction_purpose' => 'nullable|in:expense,balance_adjustment,opening_balance,transaction_fee,withdraw,deposit',
        ]);
    
        try {
            // Update the existing currency transaction
            $currencyTransaction->update([
                'currency_id' => $request->currency_id,
                'transaction_type' => $request->transaction_type,
                'amount' => $request->amount,
                'user_id' => $request->user_id,
                'user_role' => $request->user_role,
                'reference' => $request->reference,
                'transaction_description' => $request->transaction_description,
                'transaction_date' => $request->transaction_date ?? now(),
                'transaction_status' => $request->transaction_status,
                'transaction_purpose' => $request->transaction_purpose,
                'updated_by' => Auth::id(),  // You can set the user who updated the transaction
            ]);
    
            return redirect()->route('currency_transactions.index')->with('success', 'Transaction updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to update transaction: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified currency reserve transaction from storage.
     */
    public function destroy(CurrencyTransaction $CurrencyTransaction)
    {
        try {
            // Delete the transaction
            $CurrencyTransaction->delete();

            return redirect()->route('currency_transactions.index')->with('error', 'Transaction deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to delete transaction: ' . $e->getMessage());
        }
    }

}