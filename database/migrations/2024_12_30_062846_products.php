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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('name'); // Product name
            $table->text('description')->nullable(); // Product description (optional)
            $table->decimal('price', 8, 2); // Product price (8 digits, 2 decimal places)
            $table->integer('stock')->default(0); // Stock quantity
            $table->string('sku')->unique(); // Unique product SKU (Stock Keeping Unit)
            $table->boolean('is_active')->default(true); // Active status
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
