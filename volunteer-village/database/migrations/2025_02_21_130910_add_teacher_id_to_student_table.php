<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeacherIdToStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student', function (Blueprint $table) {
            // Add the Teacher_ID column
            $table->unsignedBigInteger('Teacher_ID')->nullable();

            // Set the Teacher_ID column as a foreign key
            $table->foreign('Teacher_ID')->references('Teacher_ID')->on('teacher')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['Teacher_ID']);

            // Drop the Teacher_ID column
            $table->dropColumn('Teacher_ID');
        });
    }
}