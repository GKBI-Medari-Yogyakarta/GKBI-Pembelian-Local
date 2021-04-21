<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratIjinMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_ijin_masuks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('s_jln_id')->nullable();
            $table->foreign('s_jln_id')->references('id')->on('surat_jalans')->onDelete('cascade');
            $table->string('no_ijin')->nullable();
            $table->dateTime('tgl_')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('surat_ijin_masuks');
    }
}
