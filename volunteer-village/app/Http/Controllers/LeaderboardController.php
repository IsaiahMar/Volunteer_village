<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index()
    {
        $leaderboard = DB::table('leaderboard')
            ->join('users', 'leaderboard.student_id', '=', 'users.id')
            ->select(
                'users.first_name',
                'users.last_name',
                'users.profile_photo_path',
                'leaderboard.total_hours'
            )
            ->orderByDesc('leaderboard.total_hours')
            ->get();

        return view('leaderboard', compact('leaderboard'));
    }
}
