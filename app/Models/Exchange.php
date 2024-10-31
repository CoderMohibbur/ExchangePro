<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'exchange_type',
        'date_time',
        'seller_name',
        'buyer_name',
        'currency_id',
        'quantity',
        'rate',
        'paid_to_seller_bdt',
        'status',
    ];

    /**
     * Define relationship with Currency.
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
