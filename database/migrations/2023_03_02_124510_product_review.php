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
        Schema::create('productReview', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProduct')->unsigned();
            $table->unsignedBigInteger('idCustomer')->unsigned();
            $table->foreign('idProduct')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('idCustomer')->references('id')->on('customers')->onDelete('cascade');
            $table->integer('star');
            $table->string('review')->nullable();
            $table->string('image')->nullable();
            $table->date('reviewDate');
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
        Schema::dropIfExists('productReview');
    }
};
