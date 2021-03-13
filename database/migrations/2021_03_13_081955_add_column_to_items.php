<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToItems extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->date('tgl_beli')->after('barang_masuk')->nullable();
            $table->date('tempo_pembayaran')->after('tgl_beli')->nullable();
            $table->string('pemesan')->after('tempo_pembayaran')->nullable();
            $table->string('nota_spb')->after('pemesan')->nullable();
            $table->string('harga_item')->after('nota_spb')->nullable();
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->enum('payment_status', [1, 0])->after('payment_type')->nullable();
            $table->string('dibayarkan')->after('terpakai')->nullable();
        });
    }
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            //
        });
    }
}
