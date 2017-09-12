<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAuthUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',30)->comment('用户名称');
            $table->char('passwd',32)->comment('密码');
            $table->integer('status')->comment('状体');
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
        Schema::drop('auth_user');
    }
}
