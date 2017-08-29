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
            $table->text('title');
            $table->text('content');
            $table->text('daddress');
            $table->string('raddress', 40);
            $table->string('phone', 12);
            $table->string('email', 30);
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
