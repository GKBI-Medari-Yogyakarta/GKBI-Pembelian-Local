<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToPermintaans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permintaans', function (Blueprint $table) {
            $table->string('jumlah')->after('gudang_stok')->nullable();
            $table->string('user_pemesan_id')->after('keterangan')->nullable();
            $table->enum('status_ka_bpemesan',['1','0'])->after('user_pemesan_id')->default('1');
            $table->enum('status_ka_unit',['1','0'])->after('status_ka_bpemesan')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permintaans', function (Blueprint $table) {
            //
        });
    }
}
