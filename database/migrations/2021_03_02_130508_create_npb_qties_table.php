<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNpbQtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('npb_qties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ti_id')->nullable();
            $table->foreign('ti_id')->references('id')->on('testing_items');
            $table->string('no_urut');
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
        Schema::dropIfExists('npb_qties');
    }
}
