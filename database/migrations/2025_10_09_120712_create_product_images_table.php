<?php

// database/migrations/xxxx_xx_xx_create_product_images_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('path')->nullable(); // products/xxxx.jpg
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_primary')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes(); // اختياري

            $table->index(['product_id', 'sort_order']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('product_images');
    }
};
