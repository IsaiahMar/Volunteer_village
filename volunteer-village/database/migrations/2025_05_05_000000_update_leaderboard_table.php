<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Drop the existing table and recreate it
        Schema::dropIfExists('leaderboard');

        Schema::create('leaderboard', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->index();
            $table->integer('Student_rank')->default(0);
            $table->integer('Total_hours')->default(0);
            $table->timestamps();

            $table->foreign('student_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('leaderboard');
    }
}; 