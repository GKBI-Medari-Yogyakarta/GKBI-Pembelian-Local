<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pemesan'); //nama pemesan
            $table->string('no_pemesan')->nullable(); //nomor surat permintaan
            $table->date('tgl_pesanan')->nullable();
            $table->string('nm_barang');
            $table->string('spesifikasi');
            $table->string('unit_stok')->nullable();
            $table->string('gudang_stok')->nullable();
            $table->date('tgl_diperlukan')->nullable();
            $table->date('realisasi')->nullable();
            $table->string('keterangan', 1000)->nullable();
            $table->enum('status_direktur', ['1', '0'])->nullable();
            $table->enum('status_niaga_pembelian', ['1', '0'])->nullable();
            $table->enum('status_permintaan', ['1', '0'])->default('0');
            $table->unsignedBigInteger('bagian_id')->nullable();
            $table->foreign('bagian_id')->references('id')->on('bagians');
            $table->string('ttd_pemesan')->nullable();
            $table->string('ttd_ka_unit')->nullable();
            $table->string('ttd_direktur')->nullable();
            $table->string('ttd_niaga_pembelian')->nullable();
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
        Schema::dropIfExists('permintaans');
    }
}
