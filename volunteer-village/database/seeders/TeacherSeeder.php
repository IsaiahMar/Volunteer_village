<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed 10 teachers
        for ($i = 1; $i <= 10; $i++) {
            $firstName = "TeacherFirstName$i";
            $lastName = "TeacherLastName$i";
            $email = "teacher_user$i@example.com"; // Ensure unique email
            $phone = "987-654-321$i";
            $dateOfBirth = now()->subYears(30)->subDays($i)->toDateString();

            // Insert teacher into users table
            DB::table('users')->insert([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email, // Unique email
                'phone' => $phone,
                'dateOfBirth' => $dateOfBirth,
                'password' => Hash::make('password'), // password
                'role' => 'teacher',
                'created_at' => now(),
                'updated_at' => now(),
                'student_id' => null, // Teachers don't have student_id
                'teacher_id' => $i, // Assign unique teacher_id
            ]);
        }
    }
}