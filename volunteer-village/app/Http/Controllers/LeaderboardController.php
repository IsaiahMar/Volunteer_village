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
            ->select('users.first_name as name', 'leaderboard.total_hours') // Use 'first_name' instead of 'name'
            ->orderByDesc('leaderboard.total_hours')
            ->get();

        return view('leaderboard', compact('leaderboard'));
    }
}