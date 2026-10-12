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
        // The create_volunteer_opportunities_table migration already adds this column
        if (Schema::hasColumn('volunteer_opportunities', 'picture')) {
            return;
        }

        Schema::table('volunteer_opportunities', function (Blueprint $table) {
            $table->string('picture')->nullable()->after('Description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('volunteer_opportunities', function (Blueprint $table) {
            $table->dropColumn('picture');
        });
    }
};
