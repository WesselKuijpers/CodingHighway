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
        Schema::connection('mysql-forum')->create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('exercise_id')->nullable();
            $table->unsignedInteger('lesson_id')->nullable();
            $table->string('content');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('exercise_id')
                ->references('id')->on('exercises')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('lesson_id')
                ->references('id')->on('lessons')
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
        Schema::disableForeignKeyConstraints();
        Schema::connection('mysql-forum')->dropIfExists('questions');
        Schema::enableForeignKeyConstraints();
    }
}
