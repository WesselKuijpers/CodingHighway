<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNextLessonToLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
          $table->boolean('is_first')->default(false);
          $table->unsignedInteger('next_lesson')->nullable();

          $table->foreign('next_lesson')
            ->references('id')->on('lessons')
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
        Schema::table('lesson', function (Blueprint $table) {
            //
        });
        Schema::enableForeignKeyConstraints();
    }
}
