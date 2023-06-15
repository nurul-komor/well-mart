<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code', 100)->unique();
            $table->string('productName', 100);
            $table->string('productImage', 100);
            $table->string('productImage2', 100)->nullable();
            $table->string('brands', 50)->nullable();
            $table->json('options')->nullable();
            $table->json('colors')->nullable();
            $table->float('price', 8, 2);
            $table->text('description');
            $table->string('discount')->nullable();
            $table->string('sellerId');
            $table->string('quantity', 100);
            $table->unsignedBigInteger('product_cat');
            $table->foreign('product_cat')->references('id')->on('product_categories');
            $table->tinyInteger('status')->default("2");
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
};