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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_category_id')->constrained('fee_categories')->onDelete('cascade');
            $table->string('academic_year'); // e.g., "2025-2026"
            $table->decimal('annual_payment', 10, 2); // Annual fee
            $table->decimal('term1_payment', 10, 2); // Term 1 fee
            $table->decimal('term2_payment', 10, 2); // Term 2 fee
            $table->decimal('term3_payment', 10, 2); // Term 3 fee
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
