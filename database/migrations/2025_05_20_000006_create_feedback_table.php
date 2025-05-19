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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('message');
            $table->enum('type', ['bug', 'feature', 'improvement', 'general', 'other'])->default('general');
            $table->integer('rating')->nullable(); // 1-5 star rating
            $table->string('page_url')->nullable(); // Where the feedback was submitted from
            $table->string('browser')->nullable(); // User's browser info
            $table->string('os')->nullable(); // User's OS info
            $table->enum('status', ['new', 'in_progress', 'resolved', 'closed'])->default('new');
            $table->text('admin_notes')->nullable(); // Internal notes for admins
            $table->timestamps();
            
            // Add indexes for faster lookups
            $table->index('user_id');
            $table->index('type');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};