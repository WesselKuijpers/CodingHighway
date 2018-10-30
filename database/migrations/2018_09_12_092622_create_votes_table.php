<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('increment');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('answer_id')->nullable();
            $table->unsignedInteger('question_id')->nullable();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('answer_id')
                ->references('id')->on('answers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('question_id')
                ->references('id')->on('questions')
                ->onDelete('cascade')
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
        Schema::dropIfExists('votes');
    }
}
