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
        $this->call(LaratrustSeeder::class);
        $this->call(SettingTableSeed::class);
        $this->call(UserTableSeed::class);
        $this->call(AboutSeed::class);
        $this->call(HistorySeed::class);
        $this->call(ManagerWordSeed::class);
    }
}
