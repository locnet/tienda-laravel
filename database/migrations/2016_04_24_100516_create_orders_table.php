<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id');
            $table->integer('product_id');
            $table->string('imei')->unique();
            $table->string('barcode');
            $table->string('model');
            $table->float('buy_price');
            $table->float('sell_price');
            $table->integer('client_id');
            $table->string('invoice');
            $table->string('coments');
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
        Schema::drop('orders');
    }
}
