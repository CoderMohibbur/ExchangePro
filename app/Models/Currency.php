<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    // Add all new fields from the migration to the $fillable array
    protected $fillable = [
        'name',
        'code',
        'exchange_rate',
        'cur_sym',
        'sell_at',
        'buy_at',
        'fixed_charge_for_sell',
        'percent_charge_for_sell',
        'fixed_charge_for_buy',
        'percent_charge_for_buy',
        'reserve',
        'minimum_limit_for_sell',
        'maximum_limit_for_sell',
        'minimum_limit_for_buy',
        'maximum_limit_for_buy',
        'instruction',
        'image',
        'available_for_sell',
        'available_for_buy',
        'show_rate',
    ];

    /**
     * A currency may be associated with many exchanges.
     */
    public function exchanges()
    {
        return $this->hasMany(Exchange::class);
    }

    // If you need to access the image file path or URL dynamically
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image); // Assuming you store image URLs in 'storage' directory
    }
}