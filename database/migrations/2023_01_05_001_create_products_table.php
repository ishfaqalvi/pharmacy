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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->references('id')->on('brands');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('sub_category_id')->references('id')->on('sub_categories');
            $table->string('name');
            $table->string('formula');
            $table->string('description');
            $table->string('thumbnail');
            $table->integer('quantity');
            $table->decimal('rating', 3, 2);
            $table->enum('in_stock',['true','false']);
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
        Schema::dropIfExists('products');
    }
};