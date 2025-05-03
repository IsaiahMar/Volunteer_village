<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable()->unique()->after('role'); // Add student_id column
            $table->unsignedBigInteger('teacher_id')->nullable()->unique()->after('student_id'); // Add teacher_id column
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['student_id', 'teacher_id']); // Remove the columns if rolled back
        });
    }
};