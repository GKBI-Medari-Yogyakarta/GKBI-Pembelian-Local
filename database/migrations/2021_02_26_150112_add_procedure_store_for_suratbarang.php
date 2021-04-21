<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddProcedureStoreForSuratbarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $insertSuratIjinMasukBarangDatang = " CREATE PROCEDURE surat_update(sj_id bigint,user bigint,created Datetime, updated datetime)
                BEGIN
                    INSERT INTO surat_ijin_masuks(s_jln_id,user_id,created_at,updated_at) VALUES(sj_id,user,created,updated);
                    INSERT INTO barang_datangs(s_jln_id,created_at,updated_at) VALUES(sj_id,created,updated);
                END";
        DB::unprepared("DROP procedure IF EXISTS surat_update");
        DB::unprepared($insertSuratIjinMasukBarangDatang);
        /**$sim = "CREATE PROCEDURE sim()
                BEGIN
                    select sj.no_jalan as nj, sj.tgl_ as tanggal, sj.arsip, bd.no_rencana_pembelian as nrp, bd.no_agenda_gudang as nag, sim.* from surat_ijin_masuks as sim inner join surat_jalans as sj on sj.id = sim.s_jln_id inner join barang_datangs as bd on sj.id = bd.s_jln_id;
                END";

        DB::unprepared("DROP procedure IF EXISTS sim");
        DB::unprepared($sim);**/

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
