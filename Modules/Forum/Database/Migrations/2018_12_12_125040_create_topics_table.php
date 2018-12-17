<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('topics', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name')->unique();
      $table->unsignedInteger('media_id')->nullable();
      $table->unsignedInteger('course_id')->nullable();

      $table->foreign('media_id')
        ->references('id')->on('media')
        ->onDelete('set null')
        ->onUpdate('cascade');

      $table->foreign('course_id')
        ->references('id')->on('courses')
        ->onDelete('set null')
        ->onUpdate('cascade');

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
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('topics');
    Schema::enableForeignKeyConstraints();
  }
}
