<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',          // Add user_id here
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

    /**
     * Define relationship with User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Ensure user_id is the foreign key
    }

    protected $casts = [
        'date_time' => 'datetime',
    ];
}
