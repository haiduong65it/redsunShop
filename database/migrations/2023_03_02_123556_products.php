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
            $table->string('nameProduct');
            $table->unsignedBigInteger('idType')->auto_increment()->unsigned();
            $table->foreign('idType')->references('id')->on('types')->onDelete('cascade');
            $table->unsignedBigInteger('idBrand')->auto_increment()->unsigned();
            $table->foreign('idBrand')->references('id')->on('brands')->onDelete('cascade');
            $table->decimal('price',18,0);
            $table->longText('information');
            $table->longText('description');
            $table->string('image');
            $table->boolean('newProduct')->default(1);
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
