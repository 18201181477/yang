<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRotatable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rotatable', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('rotatime')->comment('值班日期时间戳');
            $table->integer('docid')->comment('医生id');
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
        Schema::drop('rotatable');
    }
}
