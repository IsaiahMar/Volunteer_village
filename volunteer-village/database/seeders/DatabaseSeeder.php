<?php
// filepath: /c:/Users/kisha/OneDrive/Desktop/CapStone/Volunteer_village/volunteer-village/database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

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
        $this->call(StudentSeeder::class);
    }
}