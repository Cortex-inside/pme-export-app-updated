<?php

namespace Database\Seeders;
use Database\Seeders\PaisesTableSeeder;
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
        $this->call(RolesAndPermissionTableSeeder::class);
        $this->call(CaesTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesAndPermissionComplementTableSeeder::class);
        $this->call(RolesAndPermissionAddTableSeeder::class);
        $this->call(RolesAndPermissionAdd2TableSeeder::class);
        $this->call(PaisesTableSeeder::class);
    }
}
