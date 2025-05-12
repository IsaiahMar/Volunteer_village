<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VolunteerOpportunity;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VolunteerOpportunity::insert([
            [
                'Name' => 'Beach Cleanup',
                'Date' => '2025-06-15',
                'Location' => 'Sunny Beach',
                'Max_students' => 20,
                'Description' => 'Help clean up the beach and make it beautiful again.',
                'picture' => 'opportunity_pictures/beach_cleanup.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Name' => 'Tree Planting',
                'Date' => '2025-07-10',
                'Location' => 'Green Park',
                'Max_students' => 15,
                'Description' => 'Plant trees to help the environment.',
                'picture' => 'opportunity_pictures/tree_planting.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more opportunities as needed...
        ]);
    }
}
