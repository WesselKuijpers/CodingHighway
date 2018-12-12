<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql-course')->create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('solution_id');
            $table->text('content');
            $table->integer('rating');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('solution_id')
                ->references('id')->on('solutions')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')->on('codinghighway.users')
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
        Schema::connection('mysql-course')->dropIfExists('reviews');
    }
}
