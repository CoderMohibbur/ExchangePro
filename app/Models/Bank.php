<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    // Fillable fields
    protected $fillable = [
        'name', 
        'beneficiary_name', 
        'account_number', 
        'account_type', 
        'routing', 
        'bank_address', 
        'npsb_fee', 
        'eft_beftn_fee', 
        'balance', 
        'logo',  // Add logo to the fillable property
    ];

    // Relationship with BankTransaction model
    public function transactions()
    {
        return $this->hasMany(BankTransaction::class);
    }
}