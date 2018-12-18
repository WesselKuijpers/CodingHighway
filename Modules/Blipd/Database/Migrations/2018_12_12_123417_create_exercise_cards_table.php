<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exercise_id');
            $table->unsignedInteger('planning_id');
            $table->unsignedInteger('state_id');
            $table->timestamps();

            $table->foreign('exercise_id')
                ->references('id')->on('exercises')
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
        Schema::dropIfExists('exercise_cards');
    }
}
