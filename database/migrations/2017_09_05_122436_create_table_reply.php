<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('c_id')->comment('回复id');
            $table->string('r_name',30)->comment('回复人');
            $table->text('message')->comment('内容');
            $table->integer('time')->comment('回复时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reply');
    }
}
