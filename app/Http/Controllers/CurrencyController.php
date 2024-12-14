<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\CurrencyTransaction;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the currencies.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get search input

        // Filter currencies based on search input for 'name' or 'code'
        $currencies = Currency::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('code', 'like', "%{$search}%");
        })->paginate(10)->withQueryString(); // Maintain query string in pagination links

        return view('currencies.index', compact('currencies', 'search'));
    }

    /**
     * Show the form for creating a new currency.
     */
    public function create()
    {
        return view('currencies.create');
    }

    public function getFees($currencyId)
{
    $currency = Currency::find($currencyId);
    return response()->json([
        'fixed_charge_for_sell' => $currency->fixed_charge_for_sell,
        'percent_charge_for_sell' => $currency->percent_charge_for_sell,
    ]);
}

    /**
     * Store a newly created currency in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|unique:currencies,name|max:255',
            'code' => 'required|string|max:10',  
            'exchange_rate' => 'required|numeric|min:0',
            'cur_sym' => 'nullable|string|max:5',
            'reserve' => 'nullable|numeric',
            'fixed_charge_for_buy' => 'nullable|numeric',
            'percent_charge_for_buy' => 'nullable|numeric',
            'fixed_charge_for_sell' => 'nullable|numeric',
            'percent_charge_for_sell' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('currency_images', 'public');
        } else {
            $imagePath = null;
        }

        // Create the currency
        Currency::create([
            'name' => $request->name,
            'code' => $request->code,
            'exchange_rate' => $request->exchange_rate,
            'cur_sym' => $request->cur_sym,
            'reserve' => $request->reserve,
            'fixed_charge_for_buy' => $request->fixed_charge_for_buy,
            'percent_charge_for_buy' => $request->percent_charge_for_buy,
            'fixed_charge_for_sell' => $request->fixed_charge_for_sell,
            'percent_charge_for_sell' => $request->percent_charge_for_sell,
            'image' => $imagePath,
            'available_for_sell' => $request->has('available_for_sell'),
            'available_for_buy' => $request->has('available_for_buy'),
            'show_rate' => $request->has('show_rate'),
        ]);

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
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|unique:currencies,name,' . $currency->id . '|max:255',
            'code' => 'required|string|max:10',  
            'exchange_rate' => 'required|numeric|min:0',
            'cur_sym' => 'nullable|string|max:5',
            'reserve' => 'nullable|numeric',
            'fixed_charge_for_buy' => 'nullable|numeric',
            'percent_charge_for_buy' => 'nullable|numeric',
            'fixed_charge_for_sell' => 'nullable|numeric',
            'percent_charge_for_sell' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('currency_images', 'public');
            // Delete the old image if it exists
            if ($currency->image) {
                \Storage::delete('public/' . $currency->image);
            }
        } else {
            $imagePath = $currency->image; // Keep the old image if no new image is uploaded
        }

        // Update the currency
        $currency->update([
            'name' => $request->name,
            'code' => $request->code,
            'exchange_rate' => $request->exchange_rate,
            'cur_sym' => $request->cur_sym,
            'reserve' => $request->reserve,
            'fixed_charge_for_buy' => $request->fixed_charge_for_buy,
            'percent_charge_for_buy' => $request->percent_charge_for_buy,
            'fixed_charge_for_sell' => $request->fixed_charge_for_sell,
            'percent_charge_for_sell' => $request->percent_charge_for_sell,
            'image' => $imagePath,
            'available_for_sell' => $request->has('available_for_sell'),
            'available_for_buy' => $request->has('available_for_buy'),
            'show_rate' => $request->has('show_rate'),
        ]);

        return redirect()->route('currencies.index')->with('success', 'Currency updated successfully');
    }

    /**
     * Remove the specified currency from storage.
     */
    public function destroy(Currency $currency)
    {
        // Check if there are any associated currency transactions
        $currencyTransactions = CurrencyTransaction::where('currency_id', $currency->id)->count();
    
        if ($currencyTransactions > 0) {
            // If there are associated transactions, prevent deletion and show a message
            return redirect()->route('currencies.index')->with('error', 'Unable to delete this currency. There are transactions associated with it.');
        }
    
        // If there are no associated transactions, proceed with deleting the currency
        if ($currency->image) {
            // Delete the associated image if it exists
            $disk = \Storage::disk('public');
            
            if ($disk->exists($currency->image)) {
                $disk->delete($currency->image);
            }
        }
    
        // Delete the currency record from the database
        $currency->delete();
    
        return redirect()->route('currencies.index')->with('success', 'Currency deleted successfully');
    }
    
}
