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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAdmin')->unsigned()->nullable();`
            $table->unsignedBigInteger('idCustomer')->unsigned();
            $table->foreign('idAdmin')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('idCustomer')->references('id')->on('customers')->onDelete('cascade');
            $table->string('name');
            $table->string('tel');
            $table->string('address');
            $table->decimal('moneyTotal',18,0);
            $table->date('orderDate');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void`
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
