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
        Schema::create('app_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('app_id', 64)->unique();
            $table->string('app_secret', 128);
            $table->string('app_name');
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive', 'revoked'])->default('active');
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();
            
            // Add index for faster lookups
            $table->index('app_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_tokens');
    }
};