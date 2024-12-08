<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();  // Bank name
            $table->string('beneficiary_name'); // Beneficiary name
            $table->string('account_number');   // Account number
            $table->string('account_type');     // Account type (e.g., checking, savings)
            $table->string('routing');          // Routing number
            $table->string('bank_address');     // Bank address
            $table->decimal('npsb_fee', 10, 2)->default(0); // NPSB Fee
            $table->decimal('eft_beftn_fee', 10, 2)->default(0); // EFT/BEFTN Fee
            $table->decimal('balance', 15, 2)->default(0);  // Balance column with a default of 0
            $table->string('logo')->nullable(); // Bank logo (nullable)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
