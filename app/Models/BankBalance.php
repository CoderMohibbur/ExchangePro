<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_id',
        'amount',
        'transaction_id',
        'date_time'
    ];

    protected $casts = [
        'date_time' => 'datetime', // Cast date_time as a DateTime instance
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}