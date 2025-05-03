<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('volunteer_opportunities', function (Blueprint $table) {
            $table->string('another_column'); // Add the missing column
        });
    }

    public function down(): void
    {
        Schema::table('volunteer_opportunities', function (Blueprint $table) {
            $table->dropColumn('another_column'); // Remove the column if rolled back
        });
    }
};