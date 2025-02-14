<?php

namespace App\Http\Controllers;

use App\Models\VerifiedHour; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        // Fetch all verified hours and eager load the related student data
        $verifiedHours = VerifiedHour::with('student')->latest()->get();
        return view('student.home', compact('verifiedHours'));
    }

    public function profile()
    {
        return view('student.profile');
    }

    public function submitHours()
    {
        return view('student.submit-hours');
    }

    public function yourHours()
    {
        return view('student.your-hours');
    }

    public function messaging()
    {
        return view('student.messaging');
    }

    public function opportunityBoard()
    {
        return view('student.opportunity-board');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
