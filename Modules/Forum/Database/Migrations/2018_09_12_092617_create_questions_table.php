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
    $base = env('DB_DATABASE', false);
    $course = env('DB_DATABASE_COURSE', false);

    Schema::connection('mysql-forum')->create('questions', function (Blueprint $table) use ($base, $course) {
      $table->increments('id');
      $table->string('title');
      $table->unsignedInteger('user_id')->nullable();
      $table->unsignedInteger('exercise_id')->nullable();
      $table->unsignedInteger('lesson_id')->nullable();
      $table->string('content');

      $table->foreign('user_id')
        ->references('id')->on($base.'.users')
        ->onDelete('set null')
        ->onUpdate('cascade');

      $table->foreign('exercise_id')
        ->references('id')->on($course.'.exercises')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('lesson_id')
        ->references('id')->on($course.'.lessons')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->boolean('solved');
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
    Schema::connection('mysql-forum')->dropIfExists('questions');
    Schema::connection('mysql-forum')->enableForeignKeyConstraints();
  }
}
