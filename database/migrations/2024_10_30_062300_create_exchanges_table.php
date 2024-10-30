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
            $table->string('exchange_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('received_method');
            $table->decimal('received_amount', 15, 2);
            $table->string('send_method');
            $table->decimal('send_amount', 15, 2);
            $table->string('status')->default('Pending');
            $table->timestamps();
    
            // Foreign key for the user (assuming users table exists)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
