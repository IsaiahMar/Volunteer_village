<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin')->insert([
            'admin_name' => 'Admin User',
            'admin_pass' => Hash::make('Quack123!'),
            'admin_type' => 'Admin',
            'contact_info' => 'admin@volunteervillage.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
