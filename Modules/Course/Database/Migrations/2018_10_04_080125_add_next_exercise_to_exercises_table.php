<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNextExerciseToExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql-course')->table('exercises', function (Blueprint $table) {
          $table->boolean('is_first')->default(false);
          $table->unsignedInteger('next_exercise')->nullable();

          $table->foreign('next_exercise')
            ->references('id')->on('exercises')
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
      Schema::connection('mysql-course')->disableForeignKeyConstraints();
      Schema::connection('mysql-course')->table('exercise', function (Blueprint $table) {
        $table->dropColumn(['is_first', 'next_exercise']);
      });
      Schema::connection('mysql-course')->enableForeignKeyConstraints();
    }
}
