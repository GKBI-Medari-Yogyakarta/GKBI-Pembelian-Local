<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kab_id')->nullable();
            $table->foreign('kab_id')->references('id')->on('kabupatens');
            $table->string('nama', 100)->nullable()->default('text');
            $table->string('telp', 15)->nullable()->default('number');
            $table->string('fax', 100)->nullable();
            $table->string('alamat', 150)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('attn', 100)->nullable();
            $table->string('npwp', 200)->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
