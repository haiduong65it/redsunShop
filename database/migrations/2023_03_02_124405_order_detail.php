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
        Schema::create('orderDetail', function (Blueprint $table) {
            $table->unsignedBigInteger('idOrder')->unsigned();
            $table->unsignedBigInteger('idProduct')->unsigned();
            $table->unsignedBigInteger('idSize')->unsigned();
            $table->unsignedBigInteger('idColor')->unsigned();
            $table->foreign('idOrder')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('idProduct')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('idSize')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreign('idColor')->references('id')->on('colors')->onDelete('cascade');
            $table->integer('quality');
            $table->decimal('price',18,0);
            $table->timestamps();
            $table->primary(['idOrder','idProduct', 'idSize', 'idColor']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderDetail');
    }
};
