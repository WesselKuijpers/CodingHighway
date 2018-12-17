<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonMediaTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('lesson_media', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('lesson_id');
      $table->unsignedInteger('media_id');
      $table->timestamps();

      $table->foreign('lesson_id')
        ->references('id')->on('lessons')
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
    Schema::dropIfExists('lesson_media');
    Schema::enableForeignKeyConstraints();
  }
}
