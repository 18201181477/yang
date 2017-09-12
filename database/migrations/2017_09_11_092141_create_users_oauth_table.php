<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersOauthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_oauth', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('open_id')->comment('用户唯一id');
            $table->integer('user_id')->comment('用户id');
            $table->integer('type')->comment('第三方登录类型');
            $table->string('create_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_oauth');
    }
}
