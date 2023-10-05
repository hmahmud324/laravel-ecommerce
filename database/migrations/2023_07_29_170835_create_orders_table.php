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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('order_total');
            $table->integer('tax_total');
            $table->integer('shipping_total');
            $table->text('order_date');
            $table->text('order_timestamp');
            $table->string('order_status')->default('Pending');
            $table->text('delivery_address');
            $table->text('delivery_status')->default('Pending');
            $table->string('payment_type');
            $table->text('payment_amount')->default(0);
            $table->string('payment_status')->default('Pending');
            $table->string('transaction_id')->nullable();
            $table->string('currency')->default('BDT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
