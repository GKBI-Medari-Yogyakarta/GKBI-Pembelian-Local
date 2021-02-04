<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NegaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('negaras')->insert([
            'nama' => 'Indonesia',
            'kode' => '+62',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('negaras')->insert([
            'nama' => 'Malay',
            'kode' => '+633',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
    }
}
