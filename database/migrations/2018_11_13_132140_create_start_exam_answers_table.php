<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartExamAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::connection('mysql-course')->create('start_exam_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->unsignedInteger('question_id')->nullable();
            $table->timestamps();

            $table->foreign('question_id')
                ->references('id')->on('start_exam_questions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql-course')->dropIfExists('start_exam_answers');
    }
}
