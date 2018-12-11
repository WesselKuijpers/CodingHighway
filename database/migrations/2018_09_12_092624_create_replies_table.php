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
    Schema::connection('mysql-forum')->create('replies', function (Blueprint $table) {
      $table->increments('id');
      $table->string('content');
      $table->unsignedInteger('answer_id');
      $table->unsignedInteger('user_id')->nullable();

      $table->foreign('user_id')
        ->references('id')->on('codinghighway.users')
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
    Schema::connection('mysql-forum')->dropIfExists('replies');
    Schema::enableForeignKeyConstraints();
  }
}
