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
        'buyer_or_seller_user_id', 
        'transaction_date',  // New column for storing the transaction date
        'transaction_description',  // New column for storing the transaction description
        'transaction_status',  // New column for storing the transaction status
        'transaction_purpose',  // New column for storing the transaction purpose
        'created_by_user_id', 
        'updated_by_user_id',
        'npsb'
    ];

    // Define the relationship with Bank.
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    // Define the relationship with Exchange.
    public function exchange()
    {
        return $this->belongsTo(Exchange::class);
    }

    // Define the relationship with User as Buyer or Seller.
    public function buyerOrSeller()
    {
        return $this->belongsTo(User::class, 'buyer_or_seller_user_id');
    }

    // Define the relationship with User who created the transaction.
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    // Define the relationship with User who updated the transaction.
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_user_id');
    }

    /**
     * Event listener to update bank balance after a transaction is created.
     */   

     protected static function booted()
    {
        // After creating or updating a transaction, recalculate the bank balance
        static::created(function ($transaction) {
            $transaction->updateBankBalance();
        });

        static::updated(function ($transaction) {
            $transaction->updateBankBalance();
        });

        // After deleting a transaction, recalculate the bank balance
        static::deleted(function ($transaction) {
            $transaction->updateBankBalance();
        });
    }


    /**
     * Update the bank balance based on the transaction type.
     */
    public function updateBankBalance()
    {
        // Fetch the bank associated with the transaction
        $bank = $this->bank;

        // If the bank exists, update the balance based on transaction type
        if ($bank) {
            // Get the sum of all credit transactions for the specific bank
            $totalCredits = BankTransaction::where('bank_id', $bank->id)
                                        ->where('transaction_type', 'credit')
                                        ->sum('amount');

            // Get the sum of all debit transactions for the specific bank
            $totalDebits = BankTransaction::where('bank_id', $bank->id)
                                        ->where('transaction_type', 'debit')
                                        ->sum('amount');

            // Calculate the new balance (Credits - Debits)
            $newBalance = $totalCredits - $totalDebits;

            // Update the bank's balance with the new balance
            $bank->balance = $newBalance;

            // Save the updated bank balance
            $bank->save();
        }
    }

}
