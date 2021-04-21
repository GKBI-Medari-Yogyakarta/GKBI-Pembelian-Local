<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(NegaraSeeder::class);
        $this->call(ProvinsiSeeder::class);
        $this->call(KabupatenSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(BagianSeeder::class);
        $this->call(PermintaanSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(SupplierSeeder::class);
    }
}
