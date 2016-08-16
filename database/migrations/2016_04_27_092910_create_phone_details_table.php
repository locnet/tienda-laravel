<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model');
            $table->string('cpu');
            $table->string('ram');
            $table->string('capacity');
            $table->string('screen');
            $table->string('batery');
            $table->string('camera');
            $table->string('so');
            $table->string('tecnology');
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
        Schema::drop('phone_details');
    }
}
