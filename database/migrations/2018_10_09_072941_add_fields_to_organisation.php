<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToOrganisation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('organisations', function (Blueprint $table) {
        $table->string('fontcolor')->after('color');
        $table->unsignedInteger('image')->nullable()->after('fontcolor');
        $table->string('link')->after('image');

        $table->foreign('image')
          ->references('id')->on('media')
          ->onDelete('set null')
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
        //
    }
}
