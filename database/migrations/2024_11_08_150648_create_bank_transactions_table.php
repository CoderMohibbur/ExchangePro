<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->constrained('banks')->onDelete('cascade'); // Link to banks table
            $table->foreignId('exchange_id')->nullable()->constrained('exchanges')->onDelete('cascade'); // Link to exchanges table, nullable
            $table->enum('transaction_type', ['debit', 'credit']); // Transaction type (debit or credit)
            $table->decimal('amount', 15, 2); // Transaction amount
            $table->decimal('balance_before', 15, 2); // Balance before transaction
            $table->decimal('balance_after', 15, 2); // Balance after transaction
            $table->foreignId('buyer_or_seller_user_id')->nullable()->constrained('users')->onDelete('set null'); // Buyer or Seller user ID
            $table->foreignId('created_by_user_id')->constrained('users')->onDelete('cascade'); // User who created the transaction
            $table->foreignId('updated_by_user_id')->nullable()->constrained('users')->onDelete('set null'); // User who last updated
            $table->string('notes')->nullable(); // Optional notes
            $table->timestamps(); // Timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_transactions');
    }
};
