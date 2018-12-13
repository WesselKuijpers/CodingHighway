<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNextFields extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::connection('mysql-course')->table('exercises', function (Blueprint $table) {
      $table->renameColumn('next_exercise', 'next_id');
    });
    Schema::connection('mysql-course')->table('lessons', function (Blueprint $table) {
      $table->renameColumn('next_lesson', 'next_id');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //
  }
}
