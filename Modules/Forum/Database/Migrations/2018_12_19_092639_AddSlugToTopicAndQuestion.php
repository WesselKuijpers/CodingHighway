<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToTopicAndQuestion extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('questions', function (Blueprint $table) {
      $table->string('slug')->after('title')->nullable();
    });
    Schema::table('topics', function (Blueprint $table) {
      $table->string('slug')->after('name')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('questions', function (Blueprint $table) {
      $table->dropColumn(['slug']);
    });
    Schema::table('topics', function (Blueprint $table) {
      $table->dropColumn(['slug']);
    });
  }
}
