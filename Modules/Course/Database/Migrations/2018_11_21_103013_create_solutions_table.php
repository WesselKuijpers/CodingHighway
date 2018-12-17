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
    $base = env('DB_DATABASE', false);

    Schema::create('solutions', function (Blueprint $table) use ($base) {
      $table->increments('id');
      $table->unsignedInteger('user_id');
      $table->unsignedInteger('exercise_id');
      $table->text('content');
      $table->timestamps();

      $table->foreign('user_id')
        ->references('id')->on($base.'.users')
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
    Schema::dropIfExists('solutions');
  }
}
