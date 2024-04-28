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
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('city_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->string('order_number')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('contact_number');
            $table->integer('shipping_cost')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->enum('type',['Simple','Asan']);
            $table->enum('admin_state',['Show','Hide'])->default('Show');
            $table->enum('user_state',['Show','Hide'])->default('Show');
            $table->string('status')->default('Pending');
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
