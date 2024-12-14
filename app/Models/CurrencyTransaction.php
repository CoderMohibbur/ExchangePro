<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Currency;

class CurrencyTransaction extends Model
{
    use HasFactory;

    // Add new columns to the $fillable array
    protected $fillable = [
        'currency_id',
        'exchange_id',
        'transaction_type',
        'amount',
        'user_id',
        'user_role',
        'reference',
        'transaction_description',  // New column for transaction description
        'transaction_date',          // New column for transaction date
        'transaction_status',        // New column for transaction status
        'transaction_purpose',       // New column for transaction purpose
        'created_by', 
    ];

    /**
     * Boot method to handle balance adjustments.
     */
    protected static function booted()
    {
        // After creating or updating a transaction, recalculate the currency reserve
        static::created(function ($transaction) {
            $transaction->updateCurrencyReserve();
        });

        static::updated(function ($transaction) {
            $transaction->updateCurrencyReserve();
        });

        // After deleting a transaction, recalculate the currency reserve
        static::deleted(function ($transaction) {
            $transaction->updateCurrencyReserve();
        });
    }

    /**
     * Get the currency associated with the transaction.
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Get the exchange associated with the transaction (if any).
     */
    public function exchange()
    {
        return $this->belongsTo(Exchange::class);
    }

    /**
     * Get the user associated with the transaction (buyer or seller).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the creator of the transaction.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Update the currency reserve based on the transaction type.
     */
    public function updateCurrencyReserve()
    {
        // Fetch the currency associated with the transaction
        $currency = $this->currency;

        // If the currency exists, update the reserve based on transaction type
        if ($currency) {
            // Get the sum of all credit transactions for the specific currency
            $totalCredits = CurrencyTransaction::where('currency_id', $currency->id)
                                        ->where('transaction_type', 'credit')
                                        ->sum('amount');

            // Get the sum of all debit transactions for the specific currency
            $totalDebits = CurrencyTransaction::where('currency_id', $currency->id)
                                        ->where('transaction_type', 'debit')
                                        ->sum('amount');

            // Calculate the new reserve (Credits - Debits)
            $newReserve = $totalCredits - $totalDebits;

            // Update the currency's reserve with the new reserve
            $currency->reserve = $newReserve;

            // Save the updated currency reserve
            $currency->save();
        }
    }
}