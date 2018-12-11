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
        $table->dropColumn(['name', 'mtype']);
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
      Schema::connection('mysql-general')->table('media', function (Blueprint $table) {
        $table->string('name');
        $table->string('mtype');
      });
      Schema::enableForeignKeyConstraints();
    }
}
