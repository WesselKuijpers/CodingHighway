<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql-general')->create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->date('date');
            $table->unsignedInteger('organisation_id');
            $table->timestamps();

            $table->foreign('organisation_id')
                  ->references('id')->on('organisations')
                  ->onDelete('restrict');
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
        Schema::connection('mysql-general')->dropIfExists('invoices');
        Schema::enableForeignKeyConstraints();
    }
}
