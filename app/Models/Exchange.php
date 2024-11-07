<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'exchange_type', 'user_role', 'date_time', 'seller_name', 'buyer_name',
        'currency_id', 'quantity', 'rate', 'total_amount', 'paid_to_seller_bdt',
        'due_amount', 'npds_cost', 'bank_id', 'status', 'user_id',
    ];

    protected static function booted()
    {
        static::creating(function ($exchange) {
            $exchange->total_amount = $exchange->quantity * $exchange->rate;
            if ($exchange->exchange_type === 'buy' && $exchange->paid_to_seller_bdt < $exchange->total_amount) {
                $exchange->due_amount = $exchange->total_amount - $exchange->paid_to_seller_bdt;
            }
        });
    }

    /**
     * Adjust bank balance based on the exchange type.
     */
    public function adjustBankBalance()
    {
        $bank = $this->bank;
        $amount = $this->quantity * $this->rate;

        if ($this->exchange_type === 'buy') {
            $bank->decrement('balance', $amount + $this->npds_cost);
        } elseif ($this->exchange_type === 'sell') {
            $bank->increment('balance', $amount);
        }

        $bank->save();
    }

    /**
     * Relationship with Bank.
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    /**
     * Relationship with Currency.
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Relationship with User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
