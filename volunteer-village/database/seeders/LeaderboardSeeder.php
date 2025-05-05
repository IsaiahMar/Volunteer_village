<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LeaderboardSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        Schema::disableForeignKeyConstraints();

        // Clear the leaderboard table before seeding
        DB::table('leaderboard')->truncate();

        // Re-enable foreign key checks
        Schema::enableForeignKeyConstraints();

        $students = DB::table('users')->where('role', 'student')->get();

        foreach ($students as $index => $student) {
            DB::table('leaderboard')->insert([
                'Student_rank' => $index + 1,
                'Student_ID' => $student->id,
                'Total_hours' => rand(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
