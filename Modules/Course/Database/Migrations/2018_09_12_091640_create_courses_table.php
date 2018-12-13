<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    $gen = env('DB_DATABASE_GENERAL', false);

    Schema::connection('mysql-course')->create('courses', function (Blueprint $table) use ($gen) {
      $table->increments('id');
      $table->string('name');
      $table->text('description');
      $table->string('color');
      $table->unsignedInteger('media_id')->nullable();
      $table->softDeletes();
      $table->timestamps();

      $table->foreign('media_id')
        ->references('id')->on($gen.'.media')
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
    Schema::connection('mysql-course')->dropIfExists('courses');
    Schema::connection('mysql-course')->enableForeignKeyConstraints();
  }
}
