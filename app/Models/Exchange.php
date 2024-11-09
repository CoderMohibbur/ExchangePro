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
        'due_amount', 'npds_cost', 'bank_id', 'status', 'user_id', 'payment_status',
    ];

    protected static function booted()
    {
        static::creating(function ($exchange) {
            // Calculate total amount
            $exchange->total_amount = $exchange->quantity * $exchange->rate;

            // Calculate due amount and payment status based on `paid_to_seller_bdt`
            $exchange->updatePaymentStatus();
        });

        static::updating(function ($exchange) {
            // Recalculate due amount and payment status if `paid_to_seller_bdt` is changed
            if ($exchange->isDirty('paid_to_seller_bdt')) {
                $exchange->updatePaymentStatus();
            }
        });
    }

    /**
     * Update due amount and payment status.
     */
    public function updatePaymentStatus()
    {
        if ($this->paid_to_seller_bdt >= $this->total_amount) {
            $this->due_amount = 0;
            $this->payment_status = 'Paid';
        } elseif ($this->paid_to_seller_bdt > 0) {
            $this->due_amount = $this->total_amount - $this->paid_to_seller_bdt;
            $this->payment_status = 'Partial';
        } else {
            $this->due_amount = $this->total_amount;
            $this->payment_status = 'Due';
        }
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