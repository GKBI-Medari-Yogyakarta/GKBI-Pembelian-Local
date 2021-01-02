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
        ]);
        // DB::table('pemesans')->insert([
        //     'name' => 'pemesan',
        //     'email' => 'pemesan@gmail.com',
        //     'password' => Hash::make('1q2w3e4r'),
        // ]);
        // DB::table('gudangs')->insert([
        //     'name' => 'gudangs',
        //     'email' => 'gudang@gmail.com',
        //     'password' => Hash::make('1q2w3e4r'),
        // ]);
    }
}
