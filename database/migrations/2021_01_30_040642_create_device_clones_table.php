<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceClonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('clones')) {
            Schema::create('clones', function (Blueprint $table) {
                $table->increments('id');
                $table->string('device_imei')->nullable();
                $table->boolean('setting_2fa')->nullable()->default(false);
                $table->boolean('setting_lang')->nullable()->default(false);
                $table->string('time_store')->nullable();
                $table->string('action')->nullable();
                $table->boolean('action1')->nullable()->default(false);
                $table->boolean('action2')->nullable()->default(false);
                $table->boolean('action3')->nullable()->default(false);
                $table->boolean('action4')->nullable()->default(false);
                $table->string('action_live')->nullable();
                $table->string('alive_status')->nullable();
                $table->boolean('avatar')->nullable()->default(false);
                $table->string('cookie')->nullable();
                $table->integer('count_join_group')->nullable();
                $table->string('country')->nullable();
                $table->string('created_at_datetime')->nullable();
                $table->string('updated_at_datetime')->nullable();
                $table->string('email')->nullable();
                $table->string('fa')->nullable();
                $table->boolean('is_autofarmer_clone')->nullable()->default(false);
                $table->string('language')->nullable();
                $table->string('prefix')->nullable();
                $table->string('token')->nullable();
                $table->string('type')->nullable();
                $table->string('uid')->nullable();
                $table->string('update_date_time')->nullable();
                $table->string('update_last_time')->nullable();
                $table->string('value')->nullable();
                $table->string('_id')->nullable();
                $table->timestamps();
            });
        }   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clones');
    }
}
