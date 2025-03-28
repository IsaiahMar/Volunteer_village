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
        for ($i = 1; $i <= 10; $i++) {
            // Insert student into users table
            DB::table('users')->insert([
                'name' => "Student $i",
                'email' => "student$i@example.com",
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
                'student_id' => $i,
                'total_hours' => rand(10, 100), // Random total hours between 10 and 100
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
