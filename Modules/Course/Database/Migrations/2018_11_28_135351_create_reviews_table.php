<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    $base = env('DB_DATABASE', false);

    Schema::create('reviews', function (Blueprint $table) use ($base) {
      $table->increments('id');
      $table->unsignedInteger('solution_id');
      $table->text('content');
      $table->integer('rating');
      $table->unsignedInteger('user_id');
      $table->timestamps();

      $table->foreign('solution_id')
        ->references('id')->on('solutions')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('user_id')
        ->references('id')->on($base.'.users')
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
    Schema::dropIfExists('reviews');
  }
}
