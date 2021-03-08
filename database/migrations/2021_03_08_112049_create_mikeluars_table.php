<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMikeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mikeluars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ti_id')->nullable();
            $table->foreign('ti_id')->references('id')->on('testing_items');
            $table->enum('status_deputi', [1, 0])->nullable();
            $table->string('no_mikeluar')->nullable();
            $table->timestamps();
        });
        Schema::table('testing_items', function (Blueprint $table) {
            $table->unsignedBigInteger('mikeluar_id')->after('cek_detail')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mikeluars');
    }
}
