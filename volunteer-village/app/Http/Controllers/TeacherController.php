<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Verification;
use App\Models\VolunteerHour;

class TeacherController extends Controller
{
    public function index()
    {
        // Fetch data for the teacher's homepage
        $verifications = Verification::where('Status', 'Pending')->get();
        $hoursLogged = VolunteerHour::all();

        return view('teacher.home', compact('verifications', 'hoursLogged'));
    }
}
