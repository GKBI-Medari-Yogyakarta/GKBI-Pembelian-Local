<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('pemesans')->insert([
            'name' => 'pemesan',
            'email' => 'pemesan@gmail.com',
            'password' => Hash::make('pemesan'),
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('gudangs')->insert([
            'name' => 'gudang',
            'email' => 'gudang@gmail.com',
            'password' => Hash::make('gudang'),
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
        DB::table('akuntansis')->insert([
            'name' => 'akuntansi',
            'email' => 'akuntansi@gmail.com',
            'password' => Hash::make('akuntansi'),
            'created_at' => now(),
            'updated_at'=>now(),
        ]);
    }
}
