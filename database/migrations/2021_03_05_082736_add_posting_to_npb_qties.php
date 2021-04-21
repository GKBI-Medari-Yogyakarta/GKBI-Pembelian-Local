<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostingToNpbQties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('npb_qties', function (Blueprint $table) {
            $table->enum('posting', [1, 0])->after('no_urut')->nullable();
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign('payments_transaction_id_foreign');
            $table->dropColumn('transaction_id');
            $table->string('terpakai')->after('total')->nullable();
            $table->unsignedBigInteger('us_id')->after('payment_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('npb_qties', function (Blueprint $table) {
            //
        });
    }
}
