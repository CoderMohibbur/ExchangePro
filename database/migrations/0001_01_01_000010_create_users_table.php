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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            // Personal Information
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('full_name')->nullable()->storedAs("CONCAT(first_name, ' ', last_name)"); // Auto-generated full name
            $table->string('username')->unique()->nullable(); // Nullable, added when login access is granted
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->nullable();
            $table->string('password')->nullable(); // Nullable, added when login access is granted

            // User Type and Role
            $table->unsignedBigInteger('user_type_id')->nullable(); // Foreign key to user types
            $table->unsignedBigInteger('role_id')->nullable(); // Foreign key to roles

            // Status and Settings
            $table->boolean('active_status')->default(true);
            $table->boolean('access_status')->default(true); // Access permission
            $table->string('random_code')->nullable();
            $table->string('notificationToken')->nullable();
            $table->string('language')->default('en');
            $table->enum('rtl_ltl', ['rtl', 'ltl'])->default('ltl');
            $table->string('selected_session')->nullable();
            $table->boolean('can_login')->default(false); 
            
            // User Relations and Attributes
            $table->boolean('is_administrator')->default(false);
            $table->boolean('is_registered')->default(false);
            $table->string('device_token')->nullable();
            $table->unsignedBigInteger('style_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();

            // Created and Updated By
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // Timestamps and tokens
            $table->timestamps();
            $table->rememberToken();

            // Foreign key relationships
            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('set null');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });

        // Password Reset Tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
