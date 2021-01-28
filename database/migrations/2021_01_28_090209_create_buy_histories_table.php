<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('time')->nullable()->comment('Thoi gian');
            $table->string('self_amount')->nullable()->comment('Dien thoai tu mua: So luong');
            $table->string('self_price')->nullable()->comment('Dien thoai tu mua: Don gia');
            $table->string('self_total')->nullable()->comment('Dien thoai tu mua: Thanh tien');
            $table->string('sponsor_amount')->nullable()->comment('Dien thoai tai tro: So luong');
            $table->string('sponsor_price')->nullable()->comment('Dien thoai tai tro: Don gia');
            $table->string('sponsor_total')->nullable()->comment('Dien thoai tai tro: Thanh tien');
            $table->string('sim_amount')->nullable()->comment('Sim So luong');
            $table->string('sim_price')->nullable()->comment('Sim Don gia');
            $table->string('sim_total')->nullable()->comment('Sim Thanh tien');
            $table->string('clone_amount')->nullable()->comment('Clone So luong');
            $table->string('clone_price')->nullable()->comment('Clone Don gia');
            $table->string('clone_total')->nullable()->comment('Clone Thanh tien');
            $table->string('total_money')->nullable()->comment('Tong tien');
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
        Schema::dropIfExists('buy_histories');
    }
}
