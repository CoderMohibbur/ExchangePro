<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to users table
            $table->enum('exchange_type', ['buy', 'sell']); // Type of exchange
            $table->enum('user_role', ['buyer', 'seller']); // Role of user in the transaction
            $table->timestamp('date_time')->useCurrent(); // Timestamp of the exchange
            $table->string('seller_name')->nullable(); // Seller's name (for buy exchanges)
            $table->string('buyer_name')->nullable(); // Buyer's name (for sell exchanges)
            $table->foreignId('currency_id')->constrained()->onDelete('cascade'); // Reference to currencies table
            $table->decimal('orginal_quantity', 15, 2); // Quantity in currency
            $table->decimal('quantity', 15, 2); // Quantity in currency
            $table->decimal('rate', 10, 2); // Rate per unit
            $table->decimal('total_amount', 15, 2); // Total calculated amount
            $table->decimal('paid_to_seller_bdt', 15, 2)->nullable(); // Amount paid to seller in BDT
            $table->decimal('due_amount', 15, 2)->default(0); // Amount still owed
            $table->decimal('profit', 15, 2)->nullable(); // Profit field for sell exchanges
            $table->enum('payment_status', ['Paid', 'Partial', 'Due'])->default('Due'); // Payment status
            $table->enum('status', ['pending', 'approved', 'canceled'])->default('pending'); // Status of the exchange
            $table->foreignId('bank_id')->constrained('banks')->onDelete('cascade'); // Reference to banks table

            // Bank Transaction Fees
            $table->decimal('npsb_fee', 10, 2)->default(0); // NPSB Fee
            $table->decimal('eft_beftn_fee', 10, 2)->default(0); // EFT/BEFTN Fee

            // Currency Transaction Fees
            $table->decimal('fixed_currency_fee', 15, 2)->nullable()->default(0); // Fixed Currency Fee for exchange
            $table->decimal('percent_currency_fee', 5, 2)->nullable()->default(0); // Percentage Currency Fee for exchange

            // FIFO Profit Calculation Fields
            $table->decimal('cost_per_unit', 18, 8)->nullable(); // Cost of currency per unit
            $table->decimal('sell_price_per_unit', 18, 8)->nullable(); // Sell price per unit
            $table->decimal('sold_quantity', 15, 2)->nullable(); // Quantity sold

            $table->timestamps(); // Created at and Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchanges');
    }
};