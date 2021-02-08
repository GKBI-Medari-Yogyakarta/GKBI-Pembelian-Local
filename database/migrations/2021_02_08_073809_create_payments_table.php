<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rek_id')->nullable();
            $table->foreign('rek_id')->references('id')->on('rekenings');
            $table->string('payment_code');
            $table->enum('payment_type', ['cash', 'credit', 'hutang', 'barter'])->default('hutang');
            $table->string('keterangan')->nullable();
            $table->string('total');
            $table->string('hrga_per_item')->nullable();
            $table->string('saldo_awal');
            $table->string('saldo_akhir');
            $table->date('payment_date');
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
        Schema::dropIfExists('payments');
    }
}
