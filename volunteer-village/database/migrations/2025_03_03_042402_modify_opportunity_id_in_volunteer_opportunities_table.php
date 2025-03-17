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
            $table->dropPrimary(['Opportunity_ID']); // Drop the existing primary key
        });

        Schema::table('volunteer_opportunities', function (Blueprint $table) {
            $table->bigIncrements('Opportunity_ID')->change(); // Set to auto-increment and primary key
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
            $table->unsignedBigInteger('Opportunity_ID')->change(); // Revert changes if needed
            $table->primary('Opportunity_ID'); // Re-add the primary key if needed
        });
    }
}