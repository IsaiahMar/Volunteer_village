<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Add organization_id to users table
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('organization_id')->nullable()->after('teacher_id');
        });

        // Add organization_id to volunteer_opportunities table
        Schema::table('volunteer_opportunities', function (Blueprint $table) {
            $table->unsignedBigInteger('organization_id')->nullable()->after('Description');
            $table->foreign('organization_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('organization_id');
        });

        Schema::table('volunteer_opportunities', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->dropColumn('organization_id');
        });
    }
};