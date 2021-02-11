<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bagians')->insert([
            'id'=>1,
            'no_identitas' => '1010',
            'unit_id'=>8,
            'nama'=>'BID.TEKNIK',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>2,
            'no_identitas' => '11.1',
            'unit_id'=>5,
            'nama'=>'GALLERY',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>3,
            'no_identitas' => '110',
            'unit_id'=>7,
            'nama'=>'PPI',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>4,
            'no_identitas' => '210',
            'unit_id'=>1,
            'nama'=>'AKUNTANSI',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>5,
            'no_identitas' => '310',
            'unit_id'=>6,
            'nama'=>'PERSONALIA',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>6,
            'no_identitas' => '311',
            'unit_id'=>6,
            'nama'=>'URT',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>7,
            'no_identitas' => '312',
            'unit_id'=>6,
            'nama'=>'POLIKLINIK',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>8,
            'no_identitas' => '313',
            'unit_id'=>6,
            'nama'=>'SATPAM',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>9,
            'no_identitas' => '314',
            'unit_id'=>6,
            'nama'=>'SEKRETARIAT',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>10,
            'no_identitas' => '410',
            'unit_id'=>5,
            'nama'=>'NIAGA',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>11,
            'no_identitas' => '411',
            'unit_id'=>5,
            'nama'=>'GUDANG NIAGA',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>12,
            'no_identitas' => '510',
            'unit_id'=>10,
            'nama'=>'PREPARATION',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>13,
            'no_identitas' => '511',
            'unit_id'=>10,
            'nama'=>'GF',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>14,
            'no_identitas' => '512',
            'unit_id'=>10,
            'nama'=>'AJL',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>15,
            'no_identitas' => '513',
            'unit_id'=>10,
            'nama'=>'SHUTTLE',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>16,
            'no_identitas' => '610',
            'unit_id'=>3,
            'nama'=>'SINISHING',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>17,
            'no_identitas' => '710',
            'unit_id'=>9,
            'nama'=>'UTILITY',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>18,
            'no_identitas' => '711',
            'unit_id'=>9,
            'nama'=>'BENGKEL BESI',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>19,
            'no_identitas' => '711.1',
            'unit_id'=>9,
            'nama'=>'BENGKEL',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>20,
            'no_identitas' => '712',
            'unit_id'=>9,
            'nama'=>'BANGUNAN / AIR',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>21,
            'no_identitas' => '712.1',
            'unit_id'=>9,
            'nama'=>'BANGUNAN',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>22,
            'no_identitas' => '712.2',
            'unit_id'=>9,
            'nama'=>'AIR',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>23,
            'no_identitas' => '713',
            'unit_id'=>9,
            'nama'=>'BOILER-MESIN-AC',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>24,
            'no_identitas' => '713.1',
            'unit_id'=>9,
            'nama'=>'BOILER',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>25,
            'no_identitas' => '713.2',
            'unit_id'=>9,
            'nama'=>'AC/COMPRESOR',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>26,
            'no_identitas' => '714',
            'unit_id'=>9,
            'nama'=>'LISTRIK',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('bagians')->insert([
            'id'=>27,
            'no_identitas' => '910',
            'unit_id'=>8,
            'nama'=>'RENOVASI',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
    }
}
