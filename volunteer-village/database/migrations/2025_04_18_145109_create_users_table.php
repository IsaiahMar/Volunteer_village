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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // First name column
            $table->string('last_name');  // Last name column
            $table->string('email')->unique(); // Email column
            $table->string('phone'); // Phone column
            $table->date('dateOfBirth'); // Date of birth column
            $table->string('password'); // Password column
            $table->string('role'); // Role column
            $table->timestamps(); // Created at and updated at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};