<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->increments('id')->comment('主键自增id');
            $table->integer('user_id')->comment('用户id');//用户id
            $table->string('name',30)->comment('个人名称');//个人名称
            $table->tinyInteger('sex')->comment('性别');//性别
            $table->tinyInteger('document_type')->comment('证件类型');//证件类型
            $table->string('document_number',30)->comment('证件号码');//证件号码
            $table->string('date',35)->comment('出生日期');//出生日期
            $table->string('address',50)->comment('现居地');//现居地
            $table->string('hometown',50)->comment('家乡');//家乡
            $table->tinyInteger('job')->comment('职业');//职业
            $table->text('experience')->comment('个人经历');//个人经历
            $table->text('content')->comment('个人简介');//个人简介
            $table->char('phone',11)->comment('手机号');//手机号
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
        Schema::drop('person');
    }
}
