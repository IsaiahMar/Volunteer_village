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
        // Get all admins from the admin table
        $admins = DB::table('admin')->get();

        // Insert each admin into the users table
        foreach ($admins as $admin) {
            // Check if a user with this email already exists
            $existingUser = DB::table('users')
                ->where('email', $admin->contact_info)
                ->first();

            if (!$existingUser) {
                DB::table('users')->insert([
                    'first_name' => explode(' ', $admin->admin_name)[0] ?? 'Admin',
                    'last_name' => explode(' ', $admin->admin_name)[1] ?? 'User',
                    'email' => $admin->contact_info,
                    'password' => $admin->admin_pass,
                    'role' => 'admin',
                    'email_verified_at' => now(),
                    'created_at' => $admin->created_at,
                    'updated_at' => $admin->updated_at,
                ]);
            }
        }

        // Drop the admin table
        Schema::dropIfExists('admin');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recreate the admin table
        Schema::create('admin', function ($table) {
            $table->increments('admin_id');
            $table->string('admin_name');
            $table->string('admin_pass');
            $table->string('admin_type');
            $table->string('contact_info');
            $table->timestamps();
        });

        // Get all admin users
        $adminUsers = DB::table('users')
            ->where('role', 'admin')
            ->get();

        // Insert them back into the admin table
        foreach ($adminUsers as $user) {
            DB::table('admin')->insert([
                'admin_name' => $user->first_name . ' ' . $user->last_name,
                'admin_pass' => $user->password,
                'admin_type' => 'Admin',
                'contact_info' => $user->email,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ]);
        }
    }
}; 