<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQueque extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queque', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('医院id');
            $table->integer('ke_id')->comment('科室id');
            $table->integer('add_time')->comment('挂号时间');
            $table->integer('end_time')->comment('就诊时间');
            $table->tinyInteger('pay_status')->default('0')->comment('支付状态');
            $table->comment='挂号关联表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('queque');
    }
}
