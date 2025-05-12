<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
<<<<<<<< HEAD:volunteer-village/database/migrations/2025_05_09_120207_rename_contact_info_to_email_in_admin_table.php
        Schema::table('admin', function (Blueprint $table) {
            //
========
        Schema::table('verified_hours', function (Blueprint $table) {
            $table->text('rejection_reason')->nullable()->after('status');
>>>>>>>> origin/master:volunteer-village/database/migrations/2025_05_04_010441_add_rejection_reason_to_verified_hours_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:volunteer-village/database/migrations/2025_05_09_120207_rename_contact_info_to_email_in_admin_table.php
        Schema::table('admin', function (Blueprint $table) {
            //
========
        Schema::table('verified_hours', function (Blueprint $table) {
            $table->dropColumn('rejection_reason');
>>>>>>>> origin/master:volunteer-village/database/migrations/2025_05_04_010441_add_rejection_reason_to_verified_hours_table.php
        });
    }
};
