<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LeaderboardController extends Controller
{
    public function index()
    {
        $leaderboard = DB::table('leaderboard')
            ->join('users', 'leaderboard.student_id', '=', 'users.id')
            ->select('users.first_name', 'users.last_name', 'users.profile_photo_path', 'leaderboard.total_hours')
            ->orderByDesc('leaderboard.total_hours')
            ->get()
            ->map(function ($user) {
                // Generate the profile photo URL or use a default image
                $user->profile_photo_url = $user->profile_photo_path 
                    ? Storage::url($user->profile_photo_path) 
                    : asset('images/default-profile.png');
                return $user;
            });

        return view('leaderboard', compact('leaderboard'));
    }
}