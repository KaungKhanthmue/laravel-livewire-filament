<?php

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
            $table->ulid('id')->primary();
            $table->foreignUlid('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignUlid('brand_id')->references('id')->on('brands')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->jsonb('image_url')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('in_stock')->default(true);
            $table->boolean('on_sale')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }

    /**
     * Relationship
     */

};
