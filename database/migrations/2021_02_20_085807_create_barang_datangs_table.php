<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangDatangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_datangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('s_jln_id')->nullable();
            $table->foreign('s_jln_id')->references('id')->on('surat_jalans');
            $table->unsignedBigInteger('s_masuk_id')->nullable();
            $table->foreign('s_masuk_id')->references('id')->on('surat_ijin_masuks');
            $table->unsignedBigInteger('spb_id')->nullable();
            $table->foreign('spb_id')->references('id')->on('s_p_barangs');
            $table->string('no_rencana_pembelian');
            $table->string('no_agenda_gudang');
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
        Schema::dropIfExists('barang_datangs');
    }
}
