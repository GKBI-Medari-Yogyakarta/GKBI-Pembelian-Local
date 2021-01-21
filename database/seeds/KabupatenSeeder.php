<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kabupatens')->insert([
            'prov_id' => '1',
            'nama' => 'Sleman',
            'kota'=>'Depok',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('kabupatens')->insert([
            'prov_id' => '1',
            'nama' => 'Jogja',
            'kota'=>'Jogja',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('kabupatens')->insert([
            'prov_id' => '2',
            'nama' => 'Selang',
            'kota'=>'Ngor',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
    }
}
