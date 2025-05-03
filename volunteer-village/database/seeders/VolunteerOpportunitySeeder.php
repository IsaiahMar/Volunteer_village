<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VolunteerOpportunity;

class VolunteerOpportunitySeeder extends Seeder
{
    public function run()
    {
        VolunteerOpportunity::create([
            'Name' => 'Local Food Bank Helper',
            'Date' => '2024-04-20',
            'Location' => '123 Main Street, Local Food Bank',
            'Max_students' => 10,
            'Description' => 'Help sort and distribute food to families in need at our local food bank. Tasks include organizing donations, packing food boxes, and assisting with distribution.'
        ]);
    }
} 