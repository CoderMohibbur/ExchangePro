<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /**
     * The "booted" method of the model.
     */
    protected static function booted()
    {
        static::created(function ($exchange) {
            // Call the method to create currency transaction based on exchange type
            $exchange->createCurrencyTransaction();
        
            // Call the method to create bank transaction based on exchange type
            $exchange->createBankTransaction();

                 // Calculate due amount and payment status based on paid_to_seller_bdt
            $exchange->updatePaymentStatus();
        });
        
        static::updating(function ($exchange) {
            if ($exchange->isDirty('paid_to_seller_bdt')) {
                $exchange->updatePaymentStatus();
            }
        });

        static::deleting(function ($exchange) {
            // Call the methods to update currency reserve and bank balance after deletion

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


    public function updateCurrencyReserve()
    {
        // Fetch the currency associated with the transaction
        $currency = $this->currency;

        // If the currency exists, update the reserve based on transaction type
        if ($currency) {
            // Get the sum of all credit transactions for the specific currency
            $totalCredits = CurrencyTransaction::where('currency_id', $currency->id)
                                        ->where('transaction_type', 'credit')
                                        ->sum('amount');

            // Get the sum of all debit transactions for the specific currency
            $totalDebits = CurrencyTransaction::where('currency_id', $currency->id)
                                        ->where('transaction_type', 'debit')
                                        ->sum('amount');

            // Calculate the new reserve (Credits - Debits)
            $newReserve = $totalCredits - $totalDebits;

            // Update the currency's reserve with the new reserve
            $currency->reserve = $newReserve;

            // Save the updated currency reserve
            $currency->save();
        }
    }
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


    /**
     * Create a bank transaction.
     */
    public function createBankTransaction()
    {
        // Determine the total amount of the exchange
        $totalAmount = $this->quantity * $this->rate;
         // Initialize npsb variable to 0
        $npsb = 0;

        // Check if either the bank transaction fee or npsb_fee is greater than 0
        if ($this->npsb_fee > 0 || $this->bank_transaction_fee > 0) {
            $npsb = 1; // Set npsb to 1 if any fee is greater than 0
        }
        if ($this->exchange_type === 'buy') {
            // Create a Debit transaction if the exchange type is 'buy'
            BankTransaction::create([
                'bank_id' => $this->bank_id,
                'exchange_id' => $this->id,
                'transaction_type' => 'debit', // or 'credit'
                'amount' => $this->paid_to_seller_bdt,
                'buyer_or_seller_user_id' => $this->user_id,
                'transaction_date' => now(),
                'transaction_description' => 'Buy Exchange', // or 'Sell Exchange'
                'transaction_status' => 'completed',
                'transaction_purpose' => 'dollar_buy', // or 'dollar_sale'
                'created_by_user_id' => auth()->id(),
                'updated_by_user_id' => null,
                'npsb' => $npsb,
            ]);
        } elseif ($this->exchange_type === 'sell') {
            // Create a Credit transaction if the exchange type is 'sell'
            BankTransaction::create([
                'bank_id' => $this->bank_id,
                'exchange_id' => $this->id,
                'transaction_type' => 'debit', // or 'credit'
                'amount' => $this->paid_to_seller_bdt,
                'buyer_or_seller_user_id' => $this->user_id,
                'transaction_date' => now(),
                'transaction_description' => 'Buy Exchange', // or 'Sell Exchange'
                'transaction_status' => 'completed',
                'transaction_purpose' => 'dollar_buy', // or 'dollar_sale'
                'created_by_user_id' => auth()->id(),
                'updated_by_user_id' => null,
                'npsb' => $npsb,
            ]);
        }
    }

    /**
     * Update the reserve column in the currencies table.
     */
    public function createCurrencyTransaction()
    {
        // Determine the total amount of the exchange
        $totalAmount = $this->quantity * $this->rate;

        if ($this->exchange_type === 'buy') {
            // Create a Credit currency transaction if the exchange type is 'buy'
            CurrencyTransaction::create([
                'currency_id' => $this->currency_id,
                'exchange_id' => $this->id,
                'transaction_type' => 'credit',
                'amount' => $this->quantity,  // The total amount of the exchange
                'user_id' => $this->user_id,  // User who made the exchange
                'transaction_date' => now(),
                'transaction_description' => 'Buy Exchange',
                'transaction_status' => 'completed',  // Set the transaction status
                'transaction_purpose' => 'dollar_buy',  // Can be adjusted according to the purpose
                'created_by' => auth()->id(),
            ]);
        } elseif ($this->exchange_type === 'sell') {
            // Create a Debit currency transaction if the exchange type is 'sell'
            CurrencyTransaction::create([
                'currency_id' => $this->currency_id,
                'exchange_id' => $this->id,
                'transaction_type' => 'debit',
                'amount' => $this->quantity,  // The total amount of the exchange
                'user_id' => $this->user_id,  // User who made the exchange
                'transaction_date' => now(),
                'transaction_description' => 'Sell Exchange',
                'transaction_status' => 'completed',  // Set the transaction status
                'transaction_purpose' => 'dollar_sale',  // Can be adjusted according to the purpose
                'created_by' => auth()->id(),
            ]);
        }
    }

    // Relationships

    /**
     * Get the associated bank.
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    /**
     * Get the associated currency.
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Get the associated user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the associated currency transactions.
     */
    public function currencyTransactions()
    {
        return $this->hasMany(CurrencyTransaction::class, 'exchange_id');
    }

    /**
     * Get the associated bank transactions.
     */
    public function bankTransactions()
    {
        return $this->hasMany(BankTransaction::class, 'exchange_id');
    }
}
