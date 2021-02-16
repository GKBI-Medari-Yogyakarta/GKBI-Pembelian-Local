<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'permintaan_id' => 1,
            'tgl_status' => now(),
            'no_niaga' => '1A',
            'rencana_beli' => 10,
            'keterangan' => 'Untuk memonitor melalui CCTV',
            'no_transaction' => '1AA1',
        ]);
        DB::table('transactions')->insert([
            'permintaan_id' => 2,
            'tgl_status' => now(),
            'no_niaga' => '2A',
            'rencana_beli' => 10,
            'keterangan' => 'CCTV Untuk memonitor melalui CCTV untuk',
            'no_transaction' => '2AA2',
        ]);
    }
}
