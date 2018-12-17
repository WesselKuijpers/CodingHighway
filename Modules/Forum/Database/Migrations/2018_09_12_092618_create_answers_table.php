<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    $base = env('DB_DATABASE', false);

    Schema::create('answers', function (Blueprint $table) use ($base) {
      $table->increments('id');
      $table->string('content');
      $table->unsignedInteger('user_id')->nullable();
      $table->unsignedInteger('question_id');

      $table->foreign('user_id')
        ->references('id')->on($base.'.users')
        ->onDelete('set null')
        ->onUpdate('cascade');

      $table->foreign('question_id')
        ->references('id')->on('questions')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->boolean('is_best');
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
    Schema::dropIfExists('answers');
    Schema::enableForeignKeyConstraints();
  }
}
