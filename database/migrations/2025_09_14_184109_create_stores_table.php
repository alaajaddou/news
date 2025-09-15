<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void
	{
		Schema::create('stores', function (Blueprint $table) {
			$table->id();
			$table->string('name')->unique(); // DB name / store ID
			$table->string('language')->default('en_US');
			$table->string('currency')->default('ILS');
			$table->string('timezone')->default('Asia/Jerusalem');
			$table->string('theme')->nullable();
			$table->string('base_url')->nullable();
			$table->string('admin_url')->nullable();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('stores');
	}
};

