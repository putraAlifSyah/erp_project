<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufakturingordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufakturingorders', function (Blueprint $table) {
            $table->id();
            $table->string('kode_order');
            $table->string('nama_pemesan');
            $table->string('pesan_produk');
            $table->integer('value');
            $table->bigInteger('id_produk');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manufakturingorders');
    }
}
