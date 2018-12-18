<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('organisations', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('street');
      $table->string('housenumber');
      $table->string('zipcode');
      $table->string('city');
      $table->string('email');
      $table->boolean('paper_invoice');
      $table->string('color');
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
    Schema::dropIfExists('organisations');
    Schema::enableForeignKeyConstraints();
  }
}
