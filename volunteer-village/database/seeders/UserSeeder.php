<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed 10 users
        for ($i = 1; $i <= 10; $i++) {
            $firstName = "UserFirstName$i";
            $lastName = "UserLastName$i";
            $email = "user$i@example.com";
            $phone = "123-456-789$i";
            $dateOfBirth = now()->subYears(20)->subDays($i)->toDateString();

            // Insert user into users table
            $userId = DB::table('users')->insertGetId([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'phone' => $phone,
                'dateOfBirth' => $dateOfBirth,
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // password
                'role' => 'student',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'student_id' => $i,
                'teacher_id' => null,
            ]);

            // Insert user into leaderboard table
            DB::table('leaderboard')->insert([
                'Student_rank' => $i, // Assign rank based on loop index
                'Student_ID' => $userId,
                'Total_hours' => rand(10, 100), // Random total hours between 10 and 100
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}