<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    public function run()
    {
        DB::table('student')->insert([
            'Student_name' => 'Kishaun Brown',
            'Email' => 'kishaun.brown@example.com',
            'Phone_number' => '1234567890',
            'Grade_level' => '12',
        ]);
    }
}
