<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyReserveTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_id',
        'exchange_id',
        'transaction_type',
        'amount',
        'balance_before',
        'balance_after',
        'user_id',
        'user_role',
        'reference',
        'notes',
        'transaction_date',
        'created_by',
    ];

    /**
     * Boot method to handle balance adjustments.
     */
    protected static function booted()
    {
        static::creating(function ($transaction) {
            $currencyReserve = CurrencyReserve::where('currency_id', $transaction->currency_id)->first();

            if (!$currencyReserve) {
                throw new \Exception('Currency reserve not found for currency ID: ' . $transaction->currency_id);
            }

            // Record balance before transaction
            $transaction->balance_before = $currencyReserve->balance;

            // Adjust currency reserve balance based on transaction type
            if ($transaction->transaction_type === 'credit') {
                $currencyReserve->balance += $transaction->amount;
            } elseif ($transaction->transaction_type === 'debit') {
                $currencyReserve->balance -= $transaction->amount;
            }

            // Record balance after transaction
            $transaction->balance_after = $currencyReserve->balance;

            // Save the updated currency reserve balance
            $currencyReserve->save();
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
}
