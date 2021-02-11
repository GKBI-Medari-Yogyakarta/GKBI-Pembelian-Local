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
            'id'=>1,
            'nama' => 'AKUNTANSI',
            'alias'=>'akt',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('units')->insert([
            'id'=>2,
            'nama' => 'EXPANSI',
            'alias'=>'exp',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('units')->insert([
            'id'=>3,
            'nama' => 'FINISHING',
            'alias'=>'fns',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('units')->insert([
            'id'=>4,
            'nama' => 'GALLERY',
            'alias'=>'glr',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('units')->insert([
            'id'=>5,
            'nama' => 'NIAGA',
            'alias'=>'nga',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('units')->insert([
            'id'=>6,
            'nama' => 'PERSONALIA',
            'alias'=>'per',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('units')->insert([
            'id'=>7,
            'nama' => 'PPI',
            'alias'=>'ppi',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('units')->insert([
            'id'=>8,
            'nama' => 'RENOVASI',
            'alias'=>'renov',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('units')->insert([
            'id'=>9,
            'nama' => 'UTILITY',
            'alias'=>'utl',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('units')->insert([
            'id'=>10,
            'nama' => 'WEAVING',
            'alias'=>'weav',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
    }
}
