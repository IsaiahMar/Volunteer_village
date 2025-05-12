<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schools')->insert([
            'name' => 'McCaskey High School',
            'address' => '445 N Reservoir St',
            'city' => 'Lancaster',
            'state' => 'PA',
            'zip_code' => '17602',
            'phone' => '(717) 291-6211',
            'email' => 'info@mccaskeyhigh.edu',
            'principal_name' => 'Mr. John Smith',
            'student_count' => 2300,
            'description' => 'McCaskey High School is a public high school in Lancaster, Pennsylvania.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
} 