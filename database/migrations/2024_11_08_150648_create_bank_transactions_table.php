<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->constrained('banks')->onDelete('cascade'); // Link to banks table
            $table->foreignId('exchange_id')->nullable()->constrained('exchanges')->onDelete('cascade');
            $table->enum('transaction_type', ['debit', 'credit']); // Transaction type (debit or credit)
            $table->decimal('amount', 15, 2); // Transaction amount
            $table->foreignId('buyer_or_seller_user_id')->nullable()->constrained('users')->onDelete('set null'); // Buyer or Seller user ID
            $table->datetime('transaction_date')->nullable(); // For storing date and time (nullable)
            $table->string('transaction_description')->nullable(); // New column for storing a description of the transaction
            $table->enum('transaction_status', ['pending', 'completed', 'failed'])->default('pending'); // New column for storing transaction status
            $table->enum('transaction_purpose', [
                'opening_balance', 
                'balance_adjustment', 
                'transaction_fee', 
                'expense', 
                'dollar_buy', 
                'dollar_sale', 
                'withdraw', 
                'deposit'
            ])->nullable()->default('deposit'); // New column for storing the transaction purpose
            $table->foreignId('created_by_user_id')->constrained('users')->onDelete('cascade'); // User who created the transaction
            $table->foreignId('updated_by_user_id')->nullable()->constrained('users')->onDelete('set null'); // User who last updated
            $table->boolean('npsb')->default(0); // New column for npsb, defaulting to 0
            $table->timestamps(); // Timestamps
        });
    }
    

    public function down(): void
    {
        Schema::dropIfExists('bank_transactions');
    }
};