<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('lessons', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title');
      $table->text('content');
      $table->unsignedInteger('course_id');
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
    Schema::dropIfExists('lessons');
  }
}
