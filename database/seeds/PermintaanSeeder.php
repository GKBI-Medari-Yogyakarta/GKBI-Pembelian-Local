<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermintaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permintaans')->insert([
            'pemesan' => 'Samsul',
            'no_pemesan' => '+62812354566',
            'tgl_pesanan' => now(),
            'nm_barang' => 'Kertas',
            'spesifikasi' => 'Tulis menulis',
            'unit_stok' => '1',
            'gudang_stok' => '4',
            'jumlah' => '10',
            'tgl_diperlukan' => '2021-03-03',
            'bagian_id' => 2,
            'user_pemesan_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permintaans')->insert([
            'pemesan' => 'Sumsal Barudin',
            'no_pemesan' => '+62812354566',
            'tgl_pesanan' => now(),
            'nm_barang' => 'Monitor',
            'spesifikasi' => 'CCTV',
            'unit_stok' => '1',
            'gudang_stok' => '4',
            'jumlah' => '10',
            'tgl_diperlukan' => '2021-03-04',
            'bagian_id' => 2,
            'user_pemesan_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
