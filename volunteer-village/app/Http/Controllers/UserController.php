<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VolunteerHour;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        $totalHours = VolunteerHour::where('Student_ID', $user->student_id)->sum('Hours_Logged');

        return view('profile', compact('user', 'totalHours'));
    }
}
