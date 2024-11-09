<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    use HasFactory;

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
        'notes'
    ];

    /**
     * Boot method to handle balance adjustments.
     */
    // protected static function booted()
    // {
    //     static::creating(function ($transaction) {
    //         $bank = $transaction->bank;  // Fetch the associated bank

    //         // Record balance before transaction
    //         $transaction->balance_before = $bank->balance;

    //         // Adjust bank balance based on transaction type
    //         if ($transaction->transaction_type === 'credit') {
    //             $bank->balance += $transaction->amount;
    //         } elseif ($transaction->transaction_type === 'debit') {
    //             $bank->balance -= $transaction->amount;
    //         }

    //         // Record balance after transaction
    //         $transaction->balance_after = $bank->balance;

    //         // Save the updated bank balance
    //         $bank->save();
    //     });
    // }

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
}
