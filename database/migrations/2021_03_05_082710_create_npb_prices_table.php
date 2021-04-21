<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNpbPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('npb_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('qty_id')->nullable();
            $table->foreign('qty_id')->references('id')->on('npb_qties');
            $table->enum('sesuai_sop', [1, 0])->nullable();
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
        Schema::dropIfExists('npb_prices');
    }
}
