<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_progresses', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id');
          $table->unsignedInteger('course_id');
          $table->unsignedInteger('lesson_id')->nullable();
          $table->unsignedInteger('exercise_id')->nullable();
          $table->timestamps();

          $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

          $table->foreign('course_id')
            ->references('id')->on('courses')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('user_progresses');
    }
}
