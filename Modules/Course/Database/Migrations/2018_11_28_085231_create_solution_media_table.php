<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionMediaTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    $gen = env('DB_DATABASE_GENERAL', false);

    Schema::create('solution_media', function (Blueprint $table) use ($gen) {
      $table->increments('id');
      $table->unsignedInteger('solution_id');
      $table->unsignedInteger('media_id');
      $table->timestamps();

      $table->foreign('solution_id')
        ->references('id')->on('solutions')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('media_id')
        ->references('id')->on($gen.'.media')
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
    Schema::dropIfExists('solution_media');
  }
}
