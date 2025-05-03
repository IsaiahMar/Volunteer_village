<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Organization',
            'last_name' => 'Admin',
            'email' => 'organization@example.com',
            'password' => Hash::make('password1'),
            'role' => 'organization',
            'phone' => '1234567890',
            'dateOfBirth' => '2000-01-01',
        ]);
    }
}