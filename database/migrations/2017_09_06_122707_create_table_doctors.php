<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDoctors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('doc_id');
             $table->char('docname',20)->comment('医生名');

            $table->string('school',150)->comment('毕业院校');

            $table->text('per_info')->comment('个人简介(个人获得的成就)');

            $table->string('main',250)->comment('主治方向');

            $table->tinyInteger('age')->comment('工作经验（年）');

            $table->string('img',150)->comment('个人照片');

            $table->integer('title')->comment('医生职称 0:主任 1:教授 2:副主任 3:医师 4:实习医师 0-2为专家级 3-4为普通级');

            $table->tinyInteger('is_expert')->comment('是否是专家 1:是 0:否');

            $table->integer('hos_id')->comment('医院id');
            $table->integer('offs_pid_id')->comment('所属主科室id');
            $table->integer('offs_id')->comment('所属科室id');
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
        Schema::drop('doctors');
    }
}
