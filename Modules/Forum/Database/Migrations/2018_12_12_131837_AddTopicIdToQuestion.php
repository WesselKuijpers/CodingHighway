<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTopicIdToQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('questions', function (Blueprint $table) {
        $table->unsignedInteger('topic_id')->after('lesson_id')->nullable();

        $table->foreign('topic_id')
          ->references('id')->on('topics')
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
