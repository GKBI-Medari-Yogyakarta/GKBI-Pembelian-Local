<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'nama' => 'AKUNTANSI',
            'alias'=>'AKT',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('units')->insert([
            'nama' => 'EXPANSI',
            'alias'=>'EX',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('units')->insert([
            'nama' => 'PERSONALIA',
            'alias'=>'PER',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
    }
}
