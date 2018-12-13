<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::connection('mysql-general')->create('media', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name')->nullable();
      $table->string('content');
      $table->string('mtype');
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
    Schema::connection('mysql-general')->disableForeignKeyConstraints();
    Schema::connection('mysql-general')->dropIfExists('media');
    Schema::connection('mysql-general')->enableForeignKeyConstraints();
  }
}
