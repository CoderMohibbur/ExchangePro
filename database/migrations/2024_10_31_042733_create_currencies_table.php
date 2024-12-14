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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g., Payoneer, Wise
            $table->string('code')->nullable(); // e.g., USD, EUR
            $table->decimal('exchange_rate', 10, 4)->default(1.0000); // Optional exchange rate column
            $table->string('cur_sym', 10)->nullable(); // Currency symbol (e.g., $, €, etc.)
            $table->decimal('sell_at', 10, 4)->nullable(); // Selling rate (e.g., 1.23)
            $table->decimal('buy_at', 10, 4)->nullable(); // Buying rate (e.g., 1.21)
            $table->decimal('fixed_charge_for_sell', 10, 2)->nullable(); // Fixed charge for selling (e.g., 2.50)
            $table->decimal('percent_charge_for_sell', 5, 2)->nullable(); // Percentage charge for selling (e.g., 1.50 for 1.5%)
            $table->decimal('fixed_charge_for_buy', 10, 2)->nullable(); // Fixed charge for buying (e.g., 2.50)
            $table->decimal('percent_charge_for_buy', 5, 2)->nullable(); // Percentage charge for buying (e.g., 1.50 for 1.5%)
            $table->decimal('reserve', 10, 2)->nullable(); // Reserve amount (e.g., 100.00)
            $table->decimal('minimum_limit_for_sell', 10, 2)->nullable(); // Minimum limit for selling
            $table->decimal('maximum_limit_for_sell', 10, 2)->nullable(); // Maximum limit for selling
            $table->decimal('minimum_limit_for_buy', 10, 2)->nullable(); // Minimum limit for buying
            $table->decimal('maximum_limit_for_buy', 10, 2)->nullable(); // Maximum limit for buying
            $table->text('instruction')->nullable(); // Any instructions or additional information
            $table->string('image')->nullable(); // Image URL or file path
            $table->boolean('available_for_sell')->default(false); // Whether this currency is available for sell
            $table->boolean('available_for_buy')->default(false); // Whether this currency is available for buy
            $table->boolean('show_rate')->default(true); // Whether to show the exchange rate
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};