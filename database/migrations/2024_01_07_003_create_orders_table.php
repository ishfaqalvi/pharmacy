<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->string('order_number')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('contact_number');
            $table->foreignId('city_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->integer('shipping_cost')->nullable();
            $table->integer('discount')->nullable();
            $table->enum('payment_method',['Cash On Delivery']);
            $table->string('image')->nullable();
            $table->string('admin_deleted_at')->nullable();
            $table->string('customer_deleted_at')->nullable();
            $table->enum('status',['Pending','In Progress','Delivered','Canceled'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
