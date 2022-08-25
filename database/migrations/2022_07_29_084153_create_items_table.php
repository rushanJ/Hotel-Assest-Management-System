<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('model');
            $table->string('brand');
            $table->string('serialNo')->unique();
            $table->integer('supplierId')->unsigned();
            $table->integer('roomId')->unsigned();
            $table->timestamps();
            $table->foreign('supplierId')->references('id')->on('suppliers');
            $table->foreign('roomId')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
