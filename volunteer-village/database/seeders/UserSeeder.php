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
        // Seed teacher
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'role' => 'teacher',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'student_id' => null,
            'teacher_id' => 1,
        ]);

        // Seed 10 students
        for ($i = 1; $i <= 10; $i++) {
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

            // Seed leaderboard
            DB::table('leaderboard')->insert([
                'student_id' => $i,
                'total_hours' => rand(10, 100),
            ]);
        }
    }
}