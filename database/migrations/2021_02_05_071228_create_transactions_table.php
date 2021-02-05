<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rek_id')->nullable();
            $table->foreign('rek_id')->references('id')->on('rekenings');
            $table->string('kd_transaction');
            $table->string('keterangan')->nullable();
            $table->string('total');
            $table->string('hrga_per_item')->nullable();
            $table->string('saldo_awal');
            $table->string('saldo_akhir');
            $table->date('tgl_transaction');
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
        Schema::dropIfExists('transactions');
    }
}
