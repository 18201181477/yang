<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDoctor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name',20)->comment('医生名');
            $table->text('per_info')->comment('个人简介');
            $table->string('img',150)->comment('个人照片');
            $table->integer('user_id')->comment('医院id');
            $table->integer('ke_id')->comment('科室id');
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
        Schema::drop('doctor');
    }
}
