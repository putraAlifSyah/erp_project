<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_produk')->unsigned();
            $table->string('nama_bahan');
            $table->double('value');
            $table->string('satuan');
            $table->double('harga');
            $table->string('vendor');
            $table->timestamps();
        });
        Schema::table('Bahans', function (Blueprint $table) {
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
        Schema::dropIfExists('bahans');
    }
}
