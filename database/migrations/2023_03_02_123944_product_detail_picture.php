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
        Schema::create('productDetailPicture', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProduct')->unsigned();
            $table->unsignedBigInteger('idColor')->unsigned();
            $table->foreign('idProduct')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('idColor')->references('id')->on('colors')->onDelete('cascade');
            $table->string('image');
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
        Schema::dropIfExists('productDetailPicture');
    }
};
