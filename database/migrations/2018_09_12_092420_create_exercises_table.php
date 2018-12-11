<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::connection('mysql-course')->create('exercises', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('course_id');
      $table->text('content');
      $table->boolean('is_final');
      $table->unsignedInteger('level_id')->nullable();
      $table->timestamps();

      $table->foreign('course_id')
            ->references('id')->on('courses')
            ->onDelete('cascade')
            ->onUpdate('cascade');

      $table->foreign('level_id')
            ->references('id')->on('levels')
            ->onDelete('set null')
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
    Schema::disableForeignKeyConstraints();
    Schema::connection('mysql-course')->dropIfExists('exercises');
    Schema::enableForeignKeyConstraints();
  }
}
