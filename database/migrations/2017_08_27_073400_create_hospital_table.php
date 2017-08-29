<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital', function (Blueprint $table) {
            //医院名称    x y          
            $table->increments('id');
            $table->string('name',30)->comment('名字');//名字
            $table->string('image',50)->comment('图片');//图片
            $table->text('profile')->comment('简介');//简介
            $table->string('address',50)->comment('地址');//地址
            $table->integer('x');//
            $table->integer('y');//
            $table->string('url',30)->comment('网址');//网址
            $table->char('documents',15)->comment('营业执照');//营业执照
            $table->string('phone',16)->comment('电话');//电话
            $table->text('route')->comment('公交路线');//公交路线
            $table->integer('grade')->comment('等级');//等级
            $table->string('area',50)->comment('区域');//区域
            $table->tinyInteger('type')->comment('分类');//分类
            $table->text('rule')->comment('额外规则');//额外规则 
            $table->integer('user_id');//
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
        Schema::drop('hospital');
    }
}
