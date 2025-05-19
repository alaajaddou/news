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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('display_name');
            $table->string('category')->index(); // Account, Privacy, Notification, Language, Security
            $table->text('description')->nullable();
            $table->json('value')->nullable();
            $table->string('type')->default('text'); // text, boolean, select, number, etc.
            $table->json('options')->nullable(); // For select type, store options
            $table->boolean('is_public')->default(false); // Whether this setting is accessible to public
            $table->boolean('is_system')->default(false); // Whether this is a system setting
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};