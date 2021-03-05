<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bagian_id')->nullable();
            $table->string('nm_barang');
            $table->string('spek_barang');
            $table->string('ket_barang');
            $table->string('kd_barang');
            $table->string('ppn_barang')->nullable();
            $table->string('hrg_barang')->nullable();
            $table->string('jml_barang');
            $table->string('barang_masuk');
            $table->string('barang_keluar');
            $table->unsignedBigInteger('npb_id')->nullable();
            $table->foreign('npb_id')->references('id')->on('npb_qties');
            $table->timestamps();
        });
        Schema::table('permintaans', function (Blueprint $table) {
            $table->string('kd_barang')->after('spesifikasi')->nullable();
        });
        Schema::table('permintaan_temporaries', function (Blueprint $table) {
            $table->string('kd_barang')->after('spesifikasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
