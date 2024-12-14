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
        'bank_id',
        'status',
        'user_id',
        'payment_status',
        'npsb_fee',  // NPSB Fee
        'eft_beftn_fee', // EFT/BEFTN Fee
        'fixed_currency_fee', // Fixed Currency Fee
        'percent_currency_fee', // Percentage Currency Fee
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

        static::deleting(function ($exchange) {
            // Handle bank and currency reserve transactions
            $exchange->processDeletionTransactions();
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
     * Process the transactions when the exchange is deleted.
     */
    public function processDeletionTransactions()
    {
        // Handle Bank Transaction Fee
        $bankFee = $this->exchange_type === 'buy' ? $this->npsb_fee : $this->eft_beftn_fee;

        // Adjust the bank balance based on the transaction fee
        $bank = $this->bank;
        $bankTransactionType = $this->exchange_type === 'buy' ? 'debit' : 'credit';
        
        if ($this->paid_to_seller_bdt > 0) {
            if ($bankTransactionType === 'debit') {
                $bank->balance += $this->paid_to_seller_bdt + $bankFee;
            } else {
                $bank->balance -= $this->paid_to_seller_bdt - $bankFee;
            }
            $bank->save();
        }

        // Handle Currency Transaction Fee
        $currencyTransactionType = $this->exchange_type === 'buy' ? 'credit' : 'debit';
        $currencyFee = $this->exchange_type === 'buy' ? $this->fixed_currency_fee : $this->percent_currency_fee;

        // Update the currency reserve
        $currencyReserve = CurrencyReserve::firstOrCreate(
            ['currency_id' => $this->currency_id],
            ['balance' => 0]
        );

        $balanceAdjustment = $this->exchange_type === 'buy' ? -$this->quantity - $currencyFee : $this->quantity + $currencyFee;
        $currencyReserve->balance += $balanceAdjustment;
        $currencyReserve->save();
    }

    public function processExchangeTransaction()
    {
        // Process Bank Transactions and Currency Transactions
        $this->createBankTransaction();
        $this->createCurrencyTransaction();
    }

    public function createBankTransaction()
    {
        // Logic for creating bank transactions based on exchange type
        // Include NPSB or EFT/BEFTN Fee logic if required
    }

    public function createCurrencyTransaction()
    {
        // Logic for creating currency transactions based on exchange type
        // This is similar to the currency reserve transaction but renamed appropriately
        $currencyTransactionType = $this->exchange_type === 'buy' ? 'credit' : 'debit';
        $currencyFee = $this->exchange_type === 'buy' ? $this->fixed_currency_fee : $this->percent_currency_fee;

        // Get current balance
        $currencyReserve = CurrencyReserve::where('currency_id', $this->currency_id)->first();
        if (!$currencyReserve) {
            throw new \Exception('Currency reserve not found for currency ID: ' . $this->currency_id);
        }
        $currentBalance = $currencyReserve->balance;

        // Create currency transaction
        CurrencyTransaction::create([
            'currency_id' => $this->currency_id,
            'exchange_id' => $this->id,
            'transaction_type' => $currencyTransactionType,
            'amount' => $this->quantity,
            'balance_before' => $currentBalance,
            'balance_after' => $currentBalance + $currencyFee,
            'notes' => 'Currency update for exchange ID: ' . $this->id,
        ]);

        // Update the currency reserve balance
        $currencyReserve->balance = $currentBalance + $currencyFee;
        $currencyReserve->save();
    }
    
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currencyTransactions()
    {
        return $this->hasMany(CurrencyTransaction::class, 'exchange_id');
    }

    public function bankTransactions()
    {
        return $this->hasMany(BankTransaction::class, 'exchange_id');
    }
}