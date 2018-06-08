<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_teacher', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned();
            $table->foreign('teacher_id')->references('id')->on('subject_teacher')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subject_teacher')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('num_questions');
            $table->integer('time');
            $table->enum('type',['acak','set']);
            $table->datetime("start");
            $table->datetime("end");
            $table->string("token");
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
        Schema::dropIfExists('test_teacher');
    }
}
