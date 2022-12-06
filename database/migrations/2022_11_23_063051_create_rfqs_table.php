<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfqs', function (Blueprint $table) {
            $table->id('id_rfq');
            $table->bigInteger('id_vendor')->unsigned();
            $table->date('tanggal_order');
            $table->bigInteger('id')->unsigned();
            $table->integer('quantity');
            $table->bigInteger('id_bahan')->unsigned();
            $table->double('harga_total');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('rfqs', function (Blueprint $table) {
            $table->foreign('id_vendor')->references('id_vendor')->on('vendors')->onUpdate('cascade');
        });
        Schema::table('rfqs', function (Blueprint $table) {
            $table->foreign('id')->references('id')->on('bahans')->onUpdate('cascade');
        });
        Schema::table('rfqs', function (Blueprint $table) {
            $table->foreign('id_bahan')->references('id')->on('bahans')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rfqs');
    }
}
