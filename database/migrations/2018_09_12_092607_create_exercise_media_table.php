<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseMediaTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::connection('mysql-course')->create('exercise_media', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('exercise_id');
      $table->unsignedInteger('media_id');
      $table->timestamps();

      $table->foreign('exercise_id')
        ->references('id')->on('exercises')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('media_id')
        ->references('id')->on('codinghighway_general.media')
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
    Schema::disableForeignKeyConstraints();
    Schema::connection('mysql-course')->dropIfExists('exercise_media');
    Schema::enableForeignKeyConstraints();
  }
}
