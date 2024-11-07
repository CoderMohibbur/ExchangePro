<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyReserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_id',
        'balance',
    ];

    /**
     * Define a relationship to the Currency model.
     * 
     * Assumes that 'currency_id' is a foreign key linking
     * to the 'id' of the 'currencies' table.
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}