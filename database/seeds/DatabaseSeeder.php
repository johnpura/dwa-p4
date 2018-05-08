<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(IncidentsTableSeeder::class);
        $this->call(UpdatesTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
    }
}
