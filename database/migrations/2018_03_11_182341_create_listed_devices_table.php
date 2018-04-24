<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListedDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('listed_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('device_title');
            $table->string('device_port');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('listed_devices');
    }
}
