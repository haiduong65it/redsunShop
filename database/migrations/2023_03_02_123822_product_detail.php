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
        Schema::create('productDetail', function (Blueprint $table) {
            $table->unsignedBigInteger('idProduct')->unsigned();
            $table->foreign('idProduct')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('idSize')->unsigned();
            $table->foreign('idSize')->references('id')->on('sizes')->onDelete('cascade');
            $table->unsignedBigInteger('idColor')->unsigned();
            $table->foreign('idColor')->references('id')->on('colors')->onDelete('cascade');
            $table->integer('quality');
            $table->timestamps();
            $table->primary(['idProduct', 'idSize', 'idColor']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productDetail');
    }
};
