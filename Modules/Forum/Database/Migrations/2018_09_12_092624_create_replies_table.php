<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    $base = env('DB_DATABASE', false);

    Schema::create('replies', function (Blueprint $table) use ($base) {
      $table->increments('id');
      $table->string('content');
      $table->unsignedInteger('answer_id');
      $table->unsignedInteger('user_id')->nullable();

      $table->foreign('user_id')
        ->references('id')->on($base.'.users')
        ->onDelete('set null')
        ->onUpdate('cascade');

      $table->foreign('answer_id')
        ->references('id')->on('answers')
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
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('replies');
    Schema::enableForeignKeyConstraints();
  }
}
