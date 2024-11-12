<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'exchange_type',
        'user_role',
        'date_time',
        'seller_name',
        'buyer_name',
        'currency_id',
        'quantity',
        'rate',
        'total_amount',
        'paid_to_seller_bdt',
        'due_amount',
        'npds_cost',
        'bank_id',
        'status',
        'user_id',
        'payment_status',
    ];

    protected static function booted()
    {
        static::creating(function ($exchange) {
            // Calculate total amount
            $exchange->total_amount = $exchange->quantity * $exchange->rate;
    
            // Calculate due amount and payment status based on paid_to_seller_bdt
            $exchange->updatePaymentStatus();
        });
    
        static::updating(function ($exchange) {
            if ($exchange->isDirty('paid_to_seller_bdt')) {
                $exchange->updatePaymentStatus();
            }
        });
    
        // Automatically delete related transactions and update balances when an Exchange is deleted
        static::deleting(function ($exchange) {
            // Update bank balance based on transaction type
            $bank = $exchange->bank;
            $bankTransactionType = $exchange->exchange_type === 'buy' ? 'debit' : 'credit';
            
            if ($exchange->paid_to_seller_bdt > 0) {
                if ($bankTransactionType === 'debit') {
                    $bank->balance += $exchange->paid_to_seller_bdt;
                } else {
                    $bank->balance -= $exchange->paid_to_seller_bdt;
                }
                $bank->save();
            }
    
            // Update currency reserve balance based on exchange type
            $currencyReserve = CurrencyReserve::firstOrCreate(
                ['currency_id' => $exchange->currency_id],
                ['balance' => 0]  // Initialize balance if no reserve exists
            );
    
            $currencyTransactionType = $exchange->exchange_type === 'buy' ? 'credit' : 'debit';
            $balanceAdjustment = $exchange->exchange_type === 'buy' ? -$exchange->quantity : $exchange->quantity;
    
            // Adjust the currency reserve balance accordingly
            $currencyReserve->balance += $balanceAdjustment;
            $currencyReserve->save();
    
            // Delete related transactions
            $exchange->currencyReserveTransactions()->delete();
            $exchange->bankTransactions()->delete();
        });
    }
    
    /**
     * Update due amount and payment status.
     */
    public function updatePaymentStatus()
    {
        if ($this->paid_to_seller_bdt >= $this->total_amount) {
            $this->due_amount = 0;
            $this->payment_status = 'Paid';
        } elseif ($this->paid_to_seller_bdt > 0) {
            $this->due_amount = $this->total_amount - $this->paid_to_seller_bdt;
            $this->payment_status = 'Partial';
        } else {
            $this->due_amount = $this->total_amount;
            $this->payment_status = 'Due';
        }
    }

    /**
     * Process currency and bank transactions for the exchange.
     */
    public function processExchangeTransaction()
    {
        // Determine transaction type and balance adjustment based on exchange type
        $currencyTransactionType = $this->exchange_type === 'buy' ? 'credit' : 'debit';
        $balanceAdjustment = $this->exchange_type === 'buy' ? $this->quantity : -$this->quantity;

        // Retrieve the current balance of the currency reserve
        $currencyReserve = CurrencyReserve::where('currency_id', $this->currency_id)->first();
        if (!$currencyReserve) {
            throw new \Exception('Currency reserve not found for currency ID: ' . $this->currency_id);
        }
        $currentBalance = $currencyReserve->balance;

        // Create currency reserve transaction with correct balance values
        CurrencyReserveTransaction::create([
            'currency_id' => $this->currency_id,
            'exchange_id' => $this->id,
            'transaction_type' => $currencyTransactionType,
            'amount' => $this->quantity,
            'balance_before' => $currentBalance,
            'balance_after' => $currentBalance + $balanceAdjustment,
            'notes' => 'Currency reserve update for exchange ID: ' . $this->id,
        ]);

        // Update currency reserve balance
        $currencyReserve->balance = $currentBalance + $balanceAdjustment;
        $currencyReserve->save();

        // Determine bank transaction type
        $bankTransactionType = $this->exchange_type === 'buy' ? 'debit' : 'credit';

        // Create bank transaction if payment is made
        if ($this->paid_to_seller_bdt > 0) {
            $bankBalanceBefore = $this->bank->balance;
            $bankBalanceAfter = $this->exchange_type === 'buy'
                ? $bankBalanceBefore - $this->paid_to_seller_bdt
                : $bankBalanceBefore + $this->paid_to_seller_bdt;

            BankTransaction::create([
                'bank_id' => $this->bank_id,
                'exchange_id' => $this->id,
                'transaction_type' => $bankTransactionType,
                'amount' => $this->paid_to_seller_bdt,
                'balance_before' => $bankBalanceBefore,
                'balance_after' => $bankBalanceAfter,
                'notes' => 'Payment for exchange ID: ' . $this->id,
                'created_by_user_id' => auth()->id(), // Set the current user's ID
            ]);

            // Update bank balance
            $this->bank->balance = $bankBalanceAfter;
            $this->bank->save();
        }
    }

    /**
     * Relationship with Bank.
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    /**
     * Relationship with Currency.
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Relationship with User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with CurrencyReserveTransaction.
     */
    public function currencyReserveTransactions()
    {
        return $this->hasMany(CurrencyReserveTransaction::class, 'exchange_id');
    }

    /**
     * Relationship with BankTransaction.
     */
    public function bankTransactions()
    {
        return $this->hasMany(BankTransaction::class, 'exchange_id');
    }
}
