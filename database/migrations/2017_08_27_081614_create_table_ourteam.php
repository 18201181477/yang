<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOurteam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ourteam', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',10)->comment('姓名');
            $table->string('img',150)->comment('个人照片');
            $table->string('per_url',150)->comment('个人网址');
            $table->text('per_info')->comment('个人简介');
            $table->integer('add_time')->comment('添加时间');
            $table->comment='我们的团队';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ourteam');
    }
}
