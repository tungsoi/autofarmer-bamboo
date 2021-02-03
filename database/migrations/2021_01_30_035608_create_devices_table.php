<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imei')->nullable();
            $table->string('action_profile_id')->nullable();
            $table->string('connectivity')->nullable();
            $table->string('token')->nullable();
            $table->string('app_version_name')->nullable();
            $table->string('android_version')->nullable();
            $table->string('android_id')->nullable();
            $table->string('device_name')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('model')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('devices');
    }
}
