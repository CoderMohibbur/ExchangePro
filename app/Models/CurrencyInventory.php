<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyInventory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'currency_id',
        'exchange_id',
        'quantity',
        'cost_per_unit',
        'purchase_date',
        'original_quantity',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'quantity' => 'decimal:8',
        'original_quantity' => 'decimal:8',
        'cost_per_unit' => 'decimal:8',
        'purchase_date' => 'datetime',
    ];

    /**
     * Define the relationship with the Currency model.
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function exchange()
    {
        return $this->belongsTo(Exchange::class, 'exchange_id');
    }
}
