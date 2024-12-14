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
        Schema::create('currency_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('currency_id')->constrained()->onDelete('cascade');
            $table->foreignId('exchange_id')->nullable()->constrained('exchanges')->onDelete('cascade');
            $table->enum('transaction_type', ['debit', 'credit']);
            $table->decimal('amount', 15, 2);
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('user_role', ['buyer', 'seller'])->nullable();
            $table->string('reference')->nullable();
            $table->string('transaction_description')->nullable(); // New column for storing a description of the transaction
            $table->datetime('transaction_date')->nullable(); // For storing date and time (nullable)
            $table->enum('transaction_status', ['pending', 'completed', 'failed'])->default('pending'); // New column for storing transaction status
            // Add transaction_purpose column
            $table->enum('transaction_purpose', [
                'opening_balance', 
                'balance_adjustment', 
                'transaction_fee', 
                'expense', 
                'dollar_buy', 
                'dollar_sale', 
                'withdraw', 
                'deposit'
            ])->nullable()->default('deposit'); // Default value set to 'deposit'
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_transactions');
    }
};