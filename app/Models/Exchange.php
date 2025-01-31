<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
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
        'orginal_quantity', // Full buying or selling dollar
        'quantity', // Original available buying or selling dollar after currency fixed or percent fee
        'rate',
        'total_amount',
        'paid_to_seller_bdt',
        'due_amount',
        'profit', // Profit field for sell exchanges
        'bank_id',
        'status',
        'user_id',
        'payment_status',
        'npsb_fee', // NPSB Fee for bank
        'eft_beftn_fee', // EFT/BEFTN Fee for bank
        'fixed_currency_fee', // Fixed Currency Fee for dollar
        'percent_currency_fee', // Percentage Currency Fee for dollar
        'cost_per_unit', // Cost of currency per unit for FIFO
        'sell_price_per_unit', // Sell price per unit for FIFO
        'sold_quantity', // Quantity sold in FIFO
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
                $exchange->updatePaymentStatus(); // Update attributes
                // Save the model explicitly here
                $exchange->saveQuietly(); // Prevent triggering the `updating` event again
            }
        });

        static::deleting(function ($exchange) {

            // Restore inventory quantities in reverse FIFO (LIFO) order
            $remainingQuantity = $exchange->quantity;

            // Fetch inventory records associated with this exchange's currency
            $inventory = CurrencyInventory::where('currency_id', $exchange->currency_id)
                ->orderBy('purchase_date', 'desc') // Reverse order to restore correctly
                ->get();

            foreach ($inventory as $stock) {
                if ($remainingQuantity <= 0) break;
            
                $restoreQuantity = min($remainingQuantity, $stock->original_quantity - $stock->quantity);
                
                // Log::info("Stock ID: {$stock->id}, Original Quantity: {$stock->original_quantity}, Current Quantity: {$stock->quantity}, Restore Quantity: {$restoreQuantity}");
            
                if ($restoreQuantity > 0) {
                    $stock->quantity += $restoreQuantity;
                    $stock->save();
                    $remainingQuantity -= $restoreQuantity;
                }
            }
            if ($exchange->exchange_type === 'buy') {
                $exchange->currencyInventories()->delete();
            }
            // Call the methods to update currency reserve and bank balance after deletion
            $exchange->updateCurrencyReserve();
            $exchange->updateBankBalance();
        });
    }
    
    /**
     * Update due amount and payment status.
     */
    // public function updatePaymentStatus()
    // {
    //     if ($this->paid_to_seller_bdt >= $this->total_amount) {
    //         $this->due_amount = 0;
    //         $this->payment_status = 'Paid';
    //     } elseif ($this->paid_to_seller_bdt > 0) {
    //         $this->due_amount = $this->total_amount - $this->paid_to_seller_bdt;
    //         $this->payment_status = 'Partial';
    //     } else {
    //         $this->due_amount = $this->total_amount;
    //         $this->payment_status = 'Due';
    //     }

    //     // Save the updated payment status and due amount
    //     $this->save();
    // }

    public function updatePaymentStatus()
    {
        $this->due_amount = max(0, $this->total_amount - $this->paid_to_seller_bdt);

        if ($this->paid_to_seller_bdt >= $this->total_amount) {
            $this->payment_status = 'Paid';
        } elseif ($this->paid_to_seller_bdt > 0) {
            $this->payment_status = 'Partial';
        } else {
            $this->payment_status = 'Due';
        }

        // Do NOT call $this->save() here to avoid recursion
    }

    /**
     * Update the currency reserve based on transactions.
     */
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

    /**
     * Update the bank balance based on transactions.
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

    /**
     * Create a bank transaction.
     */
    public function createBankTransaction()
    {
        // Determine the total amount of the exchange
        $totalAmount = $this->quantity * $this->rate;

        // Initialize NPSB variable to 0
        $npsb = 0;

        // Check if either the bank transaction fee or NPSB fee is greater than 0
        if ($this->npsb_fee > 0 || $this->eft_beftn_fee > 0) {
            $npsb = 1; // Set NPSB to 1 if any fee is greater than 0
        }

        if ($this->exchange_type === 'buy') {
            // Create a Debit transaction if the exchange type is 'buy'
            BankTransaction::create([
                'bank_id' => $this->bank_id,
                'exchange_id' => $this->id,
                'transaction_type' => 'debit',
                'amount' => $this->paid_to_seller_bdt,
                'buyer_or_seller_user_id' => $this->user_id,
                'transaction_date' => now(),
                'transaction_description' => 'Buy Exchange',
                'transaction_status' => 'completed',
                'transaction_purpose' => 'dollar_buy',
                'created_by_user_id' => auth()->id(),
                'updated_by_user_id' => null,
                'npsb' => $npsb,
            ]);
        } elseif ($this->exchange_type === 'sell') {
            // Create a Credit transaction if the exchange type is 'sell'
            BankTransaction::create([
                'bank_id' => $this->bank_id,
                'exchange_id' => $this->id,
                'transaction_type' => 'credit',
                'amount' => $this->paid_to_seller_bdt,
                'buyer_or_seller_user_id' => $this->user_id,
                'transaction_date' => now(),
                'transaction_description' => 'Sell Exchange',
                'transaction_status' => 'completed',
                'transaction_purpose' => 'dollar_sale',
                'created_by_user_id' => auth()->id(),
                'updated_by_user_id' => null,
                'npsb' => $npsb,
            ]);
        }
    }

    /**
     * Create a currency transaction.
     */
    public function createCurrencyTransaction()
    {
        if ($this->exchange_type === 'buy') {
            // Create a Credit currency transaction if the exchange type is 'buy'
            CurrencyTransaction::create([
                'currency_id' => $this->currency_id,
                'exchange_id' => $this->id,
                'transaction_type' => 'credit',
                'amount' => $this->quantity,
                'user_id' => $this->user_id,
                'transaction_date' => now(),
                'transaction_description' => 'Buy Exchange',
                'transaction_status' => 'completed',
                'transaction_purpose' => 'dollar_buy',
                'created_by' => auth()->id(),
            ]);
        } elseif ($this->exchange_type === 'sell') {
            // Create a Debit currency transaction if the exchange type is 'sell'
            CurrencyTransaction::create([
                'currency_id' => $this->currency_id,
                'exchange_id' => $this->id,
                'transaction_type' => 'debit',
                'amount' => $this->quantity,
                'user_id' => $this->user_id,
                'transaction_date' => now(),
                'transaction_description' => 'Sell Exchange',
                'transaction_status' => 'completed',
                'transaction_purpose' => 'dollar_sale',
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

    public function currencyInventories()
    {
        return $this->hasMany(CurrencyInventory::class, 'exchange_id');
    }
}