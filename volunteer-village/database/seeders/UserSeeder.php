<?php

namespace Database\Seeders;

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
        // Seed 10 users
        for ($i = 1; $i <= 10; $i++) {
            $firstName = "UserFirstName$i";
            $lastName = "UserLastName$i";
            $email = "unique_user$i@example.com"; // Ensure unique email
            $phone = "123-456-789$i";
            $dateOfBirth = now()->subYears(20)->subDays($i)->toDateString();

            // Insert user into users table
            $userId = DB::table('users')->insertGetId([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email, // Unique email
                'phone' => $phone,
                'dateOfBirth' => $dateOfBirth,
                'password' => Hash::make('password'), // password
                'role' => 'student',
                'created_at' => now(),
                'updated_at' => now(),
                'student_id' => null, // Ensure no duplicate student_id
                'teacher_id' => null,
            ]);

            // Insert user into leaderboard table
            DB::table('leaderboard')->insert([
                'Student_rank' => $i, // Assign rank based on loop index
                'Student_ID' => $userId,
                'Total_hours' => rand(10, 100), // Random total hours between 10 and 100
            ]);
        }
    }
}