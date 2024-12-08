<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    use HasFactory;

    // Add new columns to the $fillable array
    protected $fillable = [
        'bank_id', 
        'exchange_id', 
        'transaction_type', 
        'amount', 
        'balance_before', 
        'balance_after', 
        'buyer_or_seller_user_id', 
        'created_by_user_id', 
        'updated_by_user_id', 
        'notes',
        'transaction_date',  // New column for storing the transaction date
        'transaction_description',  // New column for storing the transaction description
        'transaction_status',  // New column for storing the transaction status
    ];

    /**
     * Relationship with Bank.
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    /**
     * Relationship with Exchange.
     */
    public function exchange()
    {
        return $this->belongsTo(Exchange::class);
    }

    /**
     * Relationship with User as Buyer or Seller.
     */
    public function buyerOrSeller()
    {
        return $this->belongsTo(User::class, 'buyer_or_seller_user_id');
    }

    /**
     * Relationship with User who created the transaction.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    /**
     * Relationship with User who updated the transaction.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_user_id');
    }

    protected $dates = ['transaction_date']; // Cast the 'transaction_date' field to Carbon

    // Or you can explicitly cast it to a date in the $casts property:
    protected $casts = [
        'transaction_date' => 'datetime', // or 'date' if you're working with just the date
    ];
}
