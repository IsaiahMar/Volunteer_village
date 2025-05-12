<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VerifiedHour;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            VerifiedHour::create([
                'user_id' => rand(1, 3), // Assuming user IDs 1, 2, and 3 exist
                'opportunity_id' => rand(1, 2), // Assuming opportunity IDs 1 and 2 exist
                'hours' => rand(1, 5),
                'status' => 'pending',
                'description' => "Submission description for entry $i.",
                'date' => now()->subDays($i),
                'picture' => "verified_pictures/submission_$i.jpg",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
