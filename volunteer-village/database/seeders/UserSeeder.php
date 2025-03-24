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
    }
}