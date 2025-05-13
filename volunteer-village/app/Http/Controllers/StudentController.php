<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\VerifiedHour;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\VolunteerOpportunity;
use App\Models\Message;

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
            ->with('opportunity')
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
            'picture' => 'nullable|image|max:5120' // 5MB max
        ]);

        $verifiedHour = new VerifiedHour([
            'user_id' => Auth::id(),
            'opportunity_id' => $request->opportunity_id,
            'hours' => $request->hours,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 'pending'
        ]);

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time() . '_' . $picture->getClientOriginalName();
            $picture->storeAs('public/volunteer_pictures', $filename);
            $verifiedHour->picture = 'volunteer_pictures/' . $filename;
        }

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
        $student = Auth::user();
        
        // Get all conversations where the student is either sender or receiver
        $conversations = Message::where('sender_id', $student->id)
            ->orWhere('receiver_id', $student->id)
            ->with(['sender', 'receiver'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function($message) use ($student) {
                return $message->sender_id == $student->id ? $message->receiver_id : $message->sender_id;
            })
            ->map(function($messages) {
                return $messages->first();
            });

        return view('student.messaging', [
            'conversations' => $conversations,
            'activeConversation' => null
        ]);
    }

    /**
     * Display the opportunity board.
     */
    public function opportunityBoard(): View
    {
        return view('student.opportunity_board');
    }

    /**
     * Display pending service hours for approval.
     */
    public function pendingHours(): View
    {
        $pendingHours = VerifiedHour::where('status', 'pending')
            ->with(['user', 'opportunity'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('student.pending_hours', [
            'pendingHours' => $pendingHours
        ]);
    }

    /**
     * Approve or reject service hours.
     */
    public function updateHoursStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:verified,rejected',
            'rejection_reason' => 'required_if:status,rejected|nullable|string'
        ]);

        $verifiedHour = VerifiedHour::findOrFail($id);
        $verifiedHour->status = $request->status;
        
        if ($request->status === 'rejected' && $request->has('rejection_reason')) {
            $verifiedHour->rejection_reason = $request->rejection_reason;
        }

        $verifiedHour->save();

        return redirect()->back()->with('success', 'Service hours status updated successfully.');
    }
}