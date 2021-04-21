<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIjinKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ijin_keluars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mikeluar_id')->nullable();
            $table->foreign('mikeluar_id')->references('id')->on('mikeluars');
            $table->date('tgl_')->nullable();
            $table->string('ket_')->nullable();
            $table->timestamps();
        });
        Schema::table('surat_jalans', function (Blueprint $table) {
            $table->unsignedBigInteger('ijinkeluar_id')->after('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ijin_keluars');
    }
}
