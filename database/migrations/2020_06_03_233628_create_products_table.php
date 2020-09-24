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
            // unsigned
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->default('images/home_slider_1.jpg');
            $table->bigInteger('tag_id')->unsigned()->nullable()->index();
            $table->integer('brand_id')->unsigned()->index();
            $table->integer('price');
            $table->foreign('brand_id')->references('id')->on('product_brands');
            $table->foreign('tag_id')->references('id')->on('tags');
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
}
