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

    public function store(Request $request)
    {
        $request->validate([
            'Teacher_name' => 'required|string|max:255',
        ]);

        Teacher::create([
            'Teacher_name' => $request->Teacher_name,
        ]);

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }
}