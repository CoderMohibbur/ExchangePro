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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Add this if missing
            $table->enum('exchange_type', ['buy', 'sell']);
            $table->timestamp('date_time')->useCurrent();
            $table->string('seller_name')->nullable();
            $table->string('buyer_name')->nullable();
            $table->foreignId('currency_id')->constrained()->onDelete('cascade');
            $table->decimal('quantity', 15, 2);
            $table->decimal('rate', 10, 2);
            $table->decimal('paid_to_seller_bdt', 15, 2)->nullable();
            $table->enum('status', ['pending', 'approved', 'canceled'])->default('pending');
            $table->timestamps();
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
