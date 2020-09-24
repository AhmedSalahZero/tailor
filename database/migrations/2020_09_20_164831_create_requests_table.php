<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('material');
            $table->string('size');
            $table->string('color');
            $table->integer('amount')->unsigned();
            $table->string('description');
            $table->integer('expected_cost');
            $table->integer('category_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('requests');
    }
}
