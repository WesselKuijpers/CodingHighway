<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartExamsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('start_exams', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('course_id')->nullable();
      $table->timestamps();

      $table->foreign('course_id')
        ->references('id')->on('courses')
        ->onDelete('cascade')
        ->onUpdate('cascade');
    });

    Schema::create('start_exam_answers', function (Blueprint $table) {
      $table->increments('id');
      $table->string('content');
      $table->unsignedInteger('question_id')->nullable();
      $table->timestamps();

      $table->foreign('question_id')
        ->references('id')->on('start_exam_questions')
        ->onDelete('cascade')
        ->onUpdate('cascade');
    });

    Schema::create('start_exam_questions', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('start_exam_id')->nullable();
      $table->string('content');
      $table->unsignedInteger('correct_answer_id')->nullable();
      $table->timestamps();

      $table->foreign('start_exam_id')
        ->references('id')->on('start_exams')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('correct_answer_id')
        ->references('id')->on('start_exam_answers')
        ->onDelete('set null')
        ->onUpdate('cascade');
    });
    Schema::enableForeignKeyConstraints();
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('start_exams');
    Schema::dropIfExists('start_exam_answers');
    Schema::dropIfExists('start_exam_questions');
    Schema::enableForeignKeyConstraints();
  }
}
