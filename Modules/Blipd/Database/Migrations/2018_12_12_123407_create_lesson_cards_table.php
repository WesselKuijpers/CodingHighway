<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql-blipd')->create('lesson_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lesson_id');
            $table->unsignedInteger('planning_id');
            $table->unsignedInteger('state_id');
            $table->timestamps();

            $table->foreign('lesson_id')
                ->references('id')->on('codinghighway_course.lessons')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('planning_id')
                ->references('id')->on('plannings')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('state_id')
                ->references('id')->on('states')
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
        Schema::connection('mysql-blipd')->dropIfExists('lesson_cards');
    }
}
