<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAuthMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_menu', function (Blueprint $table) {
            $table->increments('mid');
            $table->string('controller',50)->comment('控制器');
            $table->string('action',30)->comment('方法');
            $table->integer('parent_id')->comment('p_id');
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
        Schema::drop('auth_menu');
    }
}
