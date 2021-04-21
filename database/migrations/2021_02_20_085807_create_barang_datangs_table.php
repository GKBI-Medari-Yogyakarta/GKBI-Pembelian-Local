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
            $table->foreign('s_jln_id')->references('id')->on('surat_jalans')->onDelete('cascade');
            $table->string('no_agenda_pembelian')->nullable();
            $table->string('no_agenda_gudang')->nullable();
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
