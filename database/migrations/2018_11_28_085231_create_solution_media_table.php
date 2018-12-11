<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql-course')->create('solution_media', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('solution_id');
            $table->unsignedInteger('media_id');
            $table->timestamps();

            $table->foreign('solution_id')
                ->references('id')->on('solutions')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('media_id')
                ->references('id')->on('codinghighway_general.media')
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
        Schema::connection('mysql-course')->dropIfExists('solution_media');
    }
}
