<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('name');
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('models');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->text('description');
        });

        Schema::create('product_color', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->unsignedInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('CASCADE');
            $table->primary(['product_id', 'color_id']);
        });

        Schema::create('product_size', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->unsignedInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('CASCADE');
            $table->primary(['product_id', 'size_id']);
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
}
