<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoicings', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_order');
            $table->bigInteger('id_customer')->unsigned();
            $table->date('expired');
            $table->string('batas_pembayaran');
            $table->integer('qty');
            $table->bigInteger('id_produk')->unsigned();
            $table->integer('sub_total');
            $table->string('status');
            $table->timestamps();
        });
        Schema::table('invoicings', function (Blueprint $table) {
            $table->foreign('id_customer')->references('id_customer')->on('customers')->onUpdate('cascade');
        });
        Schema::table('invoicings', function (Blueprint $table) {
            $table->foreign('id_produk')->references('id_produk')->on('produks')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoicings');
    }
}
