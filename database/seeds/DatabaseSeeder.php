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
        $this->call(UsersTableSeeder::class);
        $this->call(AnggotasTableSeeder::class);
        $this->call(DivisiTableSeeders::class);
        $this->call(BeritasTableSeeder::class);
        $this->call(DummyAnggota::class);
    }
}
