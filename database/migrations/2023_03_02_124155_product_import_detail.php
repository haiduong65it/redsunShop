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
        Schema::create('productImportDetail', function (Blueprint $table) {
            $table->unsignedBigInteger('idProduct')->unsigned();
            $table->unsignedBigInteger('idImport')->unsigned();
            $table->unsignedBigInteger('idSize')->unsigned();
            $table->unsignedBigInteger('idColor')->unsigned();
            $table->foreign('idImport')->references('id')->on('productImports')->onDelete('cascade');
            $table->foreign('idProduct')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('idSize')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreign('idColor')->references('id')->on('colors')->onDelete('cascade');
            $table->integer('quality');
            $table->timestamps();
            $table->primary(['idImport','idProduct', 'idSize', 'idColor']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productImportDetail');
    }
};
