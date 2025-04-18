<?php
// filepath: /c:/Users/kisha/OneDrive/Desktop/CapStone/Volunteer_village/volunteer-village/database/seeders/UsersTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'student',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'student_id' => 1001,
                'teacher_id' => null,
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'email' => 'jane.smith@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'teacher',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'student_id' => null,
                'teacher_id' => 5001,
            ],
            // Add more users as needed
        ]);
    }
}