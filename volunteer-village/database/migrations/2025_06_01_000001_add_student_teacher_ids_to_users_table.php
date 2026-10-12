<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // The create_users_table migration already adds these columns
        if (Schema::hasColumn('users', 'student_id')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            $table->integer('student_id')->nullable()->after('role');
            $table->integer('teacher_id')->nullable()->after('student_id');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['student_id', 'teacher_id']);
        });
    }
}; 