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
            $table->unsignedBigInteger('permintaan_id')->nullable();
            $table->foreign('permintaan_id')->references('id')->on('permintaans');
            $table->date('tgl_status'); //tgl niaga pada form
            $table->string('no_status'); //nomor niaga pada form
            $table->enum('status_niaga', ['1', '0'])->default('0'); //untuk status di acc atau tidak
            $table->string('rencana_beli');
            $table->string('perkiraan_biaya')->nullable();
            $table->enum('payment_type', ['cash', 'credit', 'hutang', 'barter'])->default('hutang');
            $table->string('keterangan');
            $table->enum('status_beli', ['1', '0'])->default('0'); //status pembelian
            $table->string('no_transaction')->nullable(); //nomor pembelian / transaction
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
