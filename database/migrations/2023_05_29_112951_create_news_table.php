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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('tags')->nullable();
            $table->text('content');
            $table->string('image');
            $table->string('creator')->default('admin');
            $table->unsignedBigInteger('news_cat')->nullable()->default(1);
            $table->foreign('news_cat')->references('id')->on('news_category');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};