<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'exchange_rate',
    ];

    /**
     * A currency may be associated with many exchanges.
     */
    public function exchanges()
    {
        return $this->hasMany(Exchange::class);
    }
}
