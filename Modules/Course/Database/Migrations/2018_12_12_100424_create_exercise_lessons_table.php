<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseLessonsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::connection('mysql-course')->create('exercise_lessons', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('lesson_id');
      $table->unsignedInteger('exercise_id');
      $table->dateTime('finished');
      $table->timestamps();

      $table->foreign('lesson_id')
        ->references('id')->on('lessons')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('exercise_id')
        ->references('id')->on('exercises')
        ->onDelete('cascade')
        ->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::connection('mysql-course')->dropIfExists('exercise_lessons');
  }
}
