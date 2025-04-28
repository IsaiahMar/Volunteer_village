<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\VerifiedHour;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\VolunteerOpportunity;

class StudentController extends Controller
{
    /**
     * Display the student home page.
     */
    public function home(): View
    {
        // Get the authenticated student's verified hours
        $student = Auth::user();
        $verifiedHours = VerifiedHour::where('user_id', $student->id)
            ->where('status', 'verified')
            ->orderBy('date', 'desc')
            ->get();

        return view('student.StudentHome', [
            'verifiedHours' => $verifiedHours
        ]);
    }

    /**
     * Display the student profile page.
     */
    public function profile(): View
    {
        $student = Auth::user();
        return view('student.profile', [
            'student' => $student
        ]); 
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Display the submit hours page.
     */
    public function submitHours(): View
    {
        $opportunities = VolunteerOpportunity::all();
        return view('student.submit_hours', [
            'opportunities' => $opportunities
        ]);
    }

    public function storeHours(Request $request)
    {
        $request->validate([
            'opportunity_id' => 'required|exists:volunteer_opportunities,id',
            'hours' => 'required|numeric|min:0.5',
            'date' => 'required|date',
            'description' => 'required|string',
        ]);

        $verifiedHour = new VerifiedHour([
            'user_id' => Auth::id(),
            'opportunity_id' => $request->opportunity_id,
            'hours' => $request->hours,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 'pending'
        ]);

        $verifiedHour->save();

        return redirect()->route('student.home')->with('success', 'Your hours have been submitted for verification!');
    }

    /**
     * Display the student's hours and awards.
     */
    public function yourHours(): View
    {
        $student = Auth::user();
        $hours = VerifiedHour::where('user_id', $student->id)
            ->orderBy('date', 'desc')
            ->get();
            
        return view('student.your_hours', [
            'hours' => $hours
        ]);
    }

    /**
     * Display the messaging page.
     */
    public function messaging(): View
    {
        return view('student.messaging');
    }

    /**
     * Display the opportunity board.
     */
    public function opportunityBoard(): View
    {
        return view('student.opportunity_board');
    }
}