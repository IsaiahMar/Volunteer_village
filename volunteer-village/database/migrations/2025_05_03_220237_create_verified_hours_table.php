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
        // Duplicate of 2025_02_21_151936_create_verified_hours_table; skip if it already ran
        if (Schema::hasTable('verified_hours')) {
            return;
        }

        Schema::create('verified_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('opportunity_id')->constrained('volunteer_opportunities')->onDelete('cascade');
            $table->integer('hours');
            $table->string('status')->default('pending'); // pending, verified, rejected
            $table->text('description')->nullable();
            $table->date('date');
            $table->string('picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verified_hours');
    }
};
