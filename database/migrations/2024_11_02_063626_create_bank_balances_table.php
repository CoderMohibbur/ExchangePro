<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bank_balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->constrained('banks')->onDelete('cascade'); // FK to banks
            $table->decimal('amount', 15, 2);  // Amount
            $table->string('transaction_id')->nullable(); // Optional Transaction ID
            $table->timestamp('date_time')->useCurrent(); // Date and time of entry
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_balances');
    }
};