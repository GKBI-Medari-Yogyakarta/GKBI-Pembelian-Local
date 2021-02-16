<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSPBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_p_barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->unsignedBigInteger('sup_id')->nullable();
            $table->foreign('sup_id')->references('id')->on('suppliers');
            $table->string('nota_spb')->nullable();
            $table->string('total_hrg')->nullable();
            $table->string('ppn')->nullable();
            $table->date('jadwal_datang')->nullable();
            $table->date('tempo_pembayaran')->nullable();
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
        Schema::dropIfExists('s_p_barangs');
    }
}
