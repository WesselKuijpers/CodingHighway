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
    $general = env('DB_DATABASE_GENERAL', false);
    $course = env('DB_DATABASE_COURSE', false);

    Schema::connection('mysql-forum')->create('topics', function (Blueprint $table) use ($general, $course) {
      $table->increments('id');
      $table->string('name')->unique();
      $table->unsignedInteger('media_id')->nullable();
      $table->unsignedInteger('course_id')->nullable();

      $table->foreign('media_id')
        ->references('id')->on($general.'.media')
        ->onDelete('set null')
        ->onUpdate('cascade');

      $table->foreign('course_id')
        ->references('id')->on($course.'.courses')
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
    Schema::connection('mysql-forum')->disableForeignKeyConstraints();
    Schema::connection('mysql-forum')->dropIfExists('topics');
    Schema::connection('mysql-forum')->enableForeignKeyConstraints();
  }
}
