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
        Schema::create('currency_inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('currency_id')->constrained()->cascadeOnDelete(); // Reference to currencies table
            $table->unsignedBigInteger('exchange_id')->nullable(); // Add the column without "after"
            $table->foreign('exchange_id')->references('id')->on('exchanges')->onDelete('cascade'); // Foreign key
            $table->decimal('quantity', 18, 8); // Quantity of the currency
            $table->decimal('original_quantity', 18, 8)->nullable(); // Original quantity of the currency
            $table->decimal('cost_per_unit', 18, 8); // Buying cost per unit
            $table->timestamp('purchase_date'); // Date of purchase
            $table->timestamps(); // Created at and Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_inventories');
    }
};
