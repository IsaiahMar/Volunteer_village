<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaderboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all students from the users table
        $students = DB::table('users')->where('role', 'student')->get();

        foreach ($students as $index => $student) {
            DB::table('leaderboard')->insert([
                'Student_rank' => $index + 1, // Assign rank based on loop index
                'Student_ID' => $student->id,
                'Total_hours' => rand(10, 100), // Random total hours between 10 and 100
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
