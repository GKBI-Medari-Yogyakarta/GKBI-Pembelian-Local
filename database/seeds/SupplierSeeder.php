<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            'kab_id' => '2',
            'nama' => 'CV Jaya',
            'telp' => '+6289912341234',
            'fax' => '1A',
            'alamat' => 'JL. Candi Indah',
            'attn' => 'Indah',
            'npwp' => 'NPWP',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('suppliers')->insert([
            'kab_id' => '1',
            'nama' => 'Kedai Wangi',
            'telp' => '+6289912341234',
            'fax' => '1B',
            'alamat' => 'JL. Candi Gedang',
            'attn' => 'Gedang',
            'npwp' => 'NPWP',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('suppliers')->insert([
            'kab_id' => '1',
            'nama' => 'Toko Harum',
            'telp' => '+6289912341234',
            'fax' => '2B',
            'alamat' => 'JL. Candi Lordewe',
            'attn' => 'Lordewe',
            'npwp' => 'NPWP',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
