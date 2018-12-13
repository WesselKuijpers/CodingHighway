<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceLinesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::connection('mysql-general')->create('invoice_lines', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('invoice_id');
      $table->unsignedInteger('product_id');
      $table->integer('quantity');
      $table->integer('price');
      $table->integer('discount');
      $table->timestamps();

      $table->foreign('invoice_id')
        ->references('id')->on('invoices')
        ->onDelete('restrict');

      $table->foreign('product_id')
        ->references('id')->on('products')
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
    Schema::connection('mysql-general')->disableForeignKeyConstraints();
    Schema::connection('mysql-general')->dropIfExists('invoice_lines');
    Schema::connection('mysql-general')->enableForeignKeyConstraints();
  }
}
