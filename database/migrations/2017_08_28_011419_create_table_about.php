<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAbout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->increments('aid');
            $table->string('function', 30);
            $table->string('title', 50);
            $table->text('content');
            $table->string('daddress', 100);
            $table->string('raddress', 40);
            $table->string('phone', 12);
            $table->string('email', 40);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('about');
    }
}
