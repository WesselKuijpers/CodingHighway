<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    $base = env('DB_DATABASE', false);

    Schema::create('licenses', function (Blueprint $table) use ($base) {
      $table->increments('id');
      $table->string('key')->unique();
      $table->unsignedInteger('user_id')->nullable();
      $table->unsignedInteger('organisation_id')->nullable();
      $table->dateTime('expires_at');
      $table->boolean('expired');
      $table->timestamps();

      $table->foreign('user_id')
        ->references('id')->on($base.'.users')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('organisation_id')
        ->references('id')->on('organisations')
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
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('licenses');
    Schema::enableForeignKeyConstraints();
  }
}
