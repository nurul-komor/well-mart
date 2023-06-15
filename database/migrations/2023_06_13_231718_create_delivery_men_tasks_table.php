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
        Schema::create('delivery_men_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_men_id')->nullable();
            $table->foreign('delivery_men_id')->references('id')->on('delivery_men');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            // 0 - not started, 1- in progress ,2 completed and delivered to customer
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_men_tasks');
    }
};