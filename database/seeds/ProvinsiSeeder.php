<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinsis')->insert([
            'negara_id' => '1',
            'nama' => 'Daerah Istimewa Yogyakarta',
            'alias'=>'DIY',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('provinsis')->insert([
            'negara_id' => '2',
            'nama' => 'Kuala',
            'alias'=>'K',
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
    }
}
