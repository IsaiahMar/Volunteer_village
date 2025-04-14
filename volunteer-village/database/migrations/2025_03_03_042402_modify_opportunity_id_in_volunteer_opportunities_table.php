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
            // First check if the table exists
            if (!Schema::hasTable('volunteer_opportunities')) {
                return;
            }

            // Check if the column exists before modifying
            if (Schema::hasColumn('volunteer_opportunities', 'opportunity_id')) {
                // Temporarily disable foreign key constraints
                Schema::disableForeignKeyConstraints();

                // Drop the existing primary key if it exists
                if (Schema::hasColumn('volunteer_opportunities', 'id')) {
                    $table->dropPrimary();
                }

                // Modify the opportunity_id column
                $table->unsignedBigInteger('opportunity_id')->change();

                // Set opportunity_id as the new primary key
                $table->primary('opportunity_id');

                // Re-enable foreign key constraints
                Schema::enableForeignKeyConstraints();
            }
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
            if (!Schema::hasTable('volunteer_opportunities')) {
                return;
            }

            if (Schema::hasColumn('volunteer_opportunities', 'opportunity_id')) {
                Schema::disableForeignKeyConstraints();

                // Drop the current primary key if it exists
                $table->dropPrimary();

                // Revert opportunity_id column changes
                $table->integer('opportunity_id')->change();

                // Restore the original primary key (if applicable)
                // Note: You'll need to replace 'another_column' with the actual column name
                // that was part of the original composite key, if any
                if (Schema::hasColumn('volunteer_opportunities', 'another_column')) {
                    $table->primary(['opportunity_id', 'another_column']);
                } else {
                    $table->primary('opportunity_id');
                }

                Schema::enableForeignKeyConstraints();
            }
        });
    }
}
