<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned();
            $table->foreign('teacher_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subject_teacher')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('bobot');
            $table->longText('question');
            $table->longText('a');
            $table->longText('b');
            $table->longText('c');
            $table->longText('d');
            $table->enum('correct_answer',['a','b','c','d']);

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
        Schema::dropIfExists('questions');
    }
}
