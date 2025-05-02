<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Get all users with admin role
        $admins = DB::table('users')
            ->where('role', 'admin')
            ->get();

        // Insert admin data into admin table
        foreach ($admins as $admin) {
            DB::table('admin')->insert([
                'admin_name' => $admin->first_name . ' ' . $admin->last_name,
                'admin_pass' => $admin->password,
                'admin_type' => $admin->role,
                'contact_info' => $admin->email,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration is not reversible as we can't reliably determine
        // which admin records came from which user records
    }
};
