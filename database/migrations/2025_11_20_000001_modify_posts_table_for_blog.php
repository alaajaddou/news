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
		
        Schema::table('posts', function (Blueprint $table) {
            // Add new columns for blog functionality
	        $table->string('slug')->nullable()->after('title');
	        $table->text('excerpt')->nullable()->after('content');
            $table->string('featured_image')->nullable()->after('excerpt');
            $table->boolean('is_featured')->default(false)->after('featured_image');
            $table->string('author_name')->nullable()->after('is_featured');
            $table->boolean('is_published')->default(true)->after('author_name');
            
            // Make url nullable as blog posts might not have external URLs
            $table->text('url')->nullable()->change();
            
            // Make source_name nullable as blog posts might not have external sources
            $table->string('source_name')->nullable()->change();

	        // Add unique constraint after ensuring no null values
	        $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn([
                'slug',
                'excerpt',
                'featured_image',
                'is_featured',
                'author_name',
                'is_published'
            ]);

	        // Revert nullable changes and drop unique constraint
	        $table->dropUnique(['slug']);
	        $table->text('url')->nullable(false)->change();
            $table->string('source_name')->nullable(false)->change();
        });
    }
};