<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear the users and leaderboard tables before seeding
        DB::table('users')->truncate();
        DB::table('leaderboard')->truncate();

        for ($i = 1; $i <= 10; $i++) {
            // Generate unique first name, last name, and email
            $firstName = "StudentFirstName$i";
            $lastName = "StudentLastName$i";
            $email = "student$i@example.com";
            $phone = "123-456-789$i";
            $dateOfBirth = now()->subYears(20)->subDays($i)->toDateString(); // Example DOB

            // Insert student into users table
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

            // Insert student into leaderboard table
            DB::table('leaderboard')->insert([
                'Student_rank' => $i, // Assign rank based on loop index
                'Student_ID' => $userId,
                'Total_hours' => rand(10, 100), // Random total hours between 10 and 100
            ]);
        }
    }
}