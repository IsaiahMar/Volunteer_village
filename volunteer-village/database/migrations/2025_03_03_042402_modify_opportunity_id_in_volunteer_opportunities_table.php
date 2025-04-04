<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyOpportunityIdInVolunteerOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('volunteer_opportunities', function (Blueprint $table) {
            // Drop the existing primary key
            $table->dropPrimary();

            // Modify the opportunity_id column
            $table->unsignedBigInteger('opportunity_id')->change();

            // Set opportunity_id as the new primary key
            $table->primary('opportunity_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('volunteer_opportunities', function (Blueprint $table) {
            // Drop the current primary key
            $table->dropPrimary();

            // Revert opportunity_id column changes
            $table->integer('opportunity_id')->change();

            // Restore the original primary key (if applicable)
            $table->primary(['opportunity_id', 'another_column']); // Replace 'another_column' with the actual column if it was part of the original composite key
        });
    }
}