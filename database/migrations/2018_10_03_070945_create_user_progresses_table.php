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
        Schema::connection('mysql-general')->create('user_progresses', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id');
          $table->unsignedInteger('course_id');
          $table->unsignedInteger('lesson_id')->nullable();
          $table->unsignedInteger('exercise_id')->nullable();
          $table->timestamps();

          $table->foreign('user_id')
            ->references('id')->on('codinghighway.users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

          $table->foreign('course_id')
            ->references('id')->on('codinghighway_course.courses')
            ->onDelete('cascade')
            ->onUpdate('cascade');

          $table->foreign('lesson_id')
            ->references('id')->on('codinghighway_course.lessons')
            ->onDelete('cascade')
            ->onUpdate('cascade');

          $table->foreign('exercise_id')
            ->references('id')->on('codinghighway_course.exercises')
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
      Schema::connection('mysql-general')->dropIfExists('user_progresses');
      Schema::enableForeignKeyConstraints();
    }
}
