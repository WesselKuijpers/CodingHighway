<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveFieldsFromMedia extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::connection('mysql-general')->table('media', function (Blueprint $table) {
      $table->dropColumn(['mtype']);
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
    Schema::connection('mysql-general')->table('media', function (Blueprint $table) {
      $table->string('mtype');
    });
    Schema::connection('mysql-general')->enableForeignKeyConstraints();
  }
}
