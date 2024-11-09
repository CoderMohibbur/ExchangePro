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
        Schema::create('currency_reserve_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('currency_id')->constrained()->onDelete('cascade');
            $table->foreignId('exchange_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('transaction_type', ['debit', 'credit']);
            $table->decimal('amount', 15, 2);
            $table->decimal('balance_before', 15, 2);
            $table->decimal('balance_after', 15, 2);
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('user_role', ['buyer', 'seller'])->nullable();
            $table->string('reference')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('transaction_date')->useCurrent();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_reserve_transactions');
    }
};
