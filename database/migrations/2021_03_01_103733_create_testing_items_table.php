<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testing_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bd_id')->nullable();
            $table->foreign('bd_id')->references('id')->on('barang_datangs');
            $table->string('no_test')->nullable();
            $table->date('tgl_')->nullable();
            $table->enum('selesai', [1, 0])->nullable();
            $table->enum('cek_detail', [1, 0])->nullable();
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
        Schema::dropIfExists('testing_items');
    }
}
