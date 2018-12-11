<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql-course')->create('solutions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('exercise_id');
            $table->text('content');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('codinghighway.users')
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
        Schema::connection('mysql-course')->dropIfExists('solutions');
    }
}
