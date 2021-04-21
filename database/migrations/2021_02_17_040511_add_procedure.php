<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $insertTransDetailAndSPB = " CREATE PROCEDURE transaction_acc(t_id bigint,created Datetime, updated datetime)
                BEGIN
                    INSERT INTO transaction_details(transaction_id,created_at,updated_at) VALUES(t_id,created,updated);
                    INSERT INTO s_p_barangs(transaction_id,created_at,updated_at) VALUES(t_id,created,updated);
                END";
        DB::unprepared("DROP procedure IF EXISTS transaction_acc");
        DB::unprepared($insertTransDetailAndSPB);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
