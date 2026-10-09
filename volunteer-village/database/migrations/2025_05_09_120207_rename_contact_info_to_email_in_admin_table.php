<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, check if the email column exists
        if (!Schema::hasColumn('admin', 'email')) {
            Schema::table('admin', function (Blueprint $table) {
                $table->string('email')->after('contact_info');
            });

            // Copy contact_info to email for existing records
            DB::table('admin')->update([
                'email' => DB::raw('contact_info')
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('admin', 'email')) {
            Schema::table('admin', function (Blueprint $table) {
                $table->dropColumn('email');
            });
        }
    }
};
