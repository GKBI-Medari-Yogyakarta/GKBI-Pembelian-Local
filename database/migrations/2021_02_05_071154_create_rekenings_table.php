<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekenings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bank');
            $table->string('no_rekening');
            $table->string('saldo')->nullable();
            $table->unsignedBigInteger('sup_id')->nullable();
            $table->foreign('sup_id')->references('id')->on('suppliers');
            $table->enum('status', ['PC. GKBI', 'supplier']);
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
        Schema::dropIfExists('rekenings');
    }
}
