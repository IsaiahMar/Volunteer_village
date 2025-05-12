<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VolunteerOpportunity;
use Carbon\Carbon; // Add this at the top

class VolunteerOpportunitySeeder extends Seeder
{
    public function run()
    {
        VolunteerOpportunity::create([
            'Name' => 'Local Food Bank Helper',
            'Date' => Carbon::create(2024, 4, 20), // Use Carbon for date
            'Location' => '123 Main Street, Local Food Bank',
            'Max_students' => 10,
            'Description' => 'Help sort and distribute food to families in need at our local food bank. Tasks include organizing donations, packing food boxes, and assisting with distribution.',
            'created_at' => now(), // Add timestamps
            'updated_at' => now(),
        ]);
    }
}