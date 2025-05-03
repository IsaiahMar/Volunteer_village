<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetLeaderboard extends Command
{
    protected $signature = 'leaderboard:reset';
    protected $description = 'Reset the leaderboard at the start of a new month';

    public function handle()
    {
        DB::table('leaderboard')->truncate(); // wipes the table
        $this->info('Leaderboard has been reset.');
    }
}
