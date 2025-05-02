<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(['create', 'store', 'approve']);
        $this->middleware('can:approve,school')->only(['approve']);
    }

    public function index()
    {
        $schools = Auth::user()->role === 'admin' 
            ? School::all() 
            : School::where('is_approved', true)->get();

        return view('schools.index', compact('schools'));
    }

    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'zip_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:schools',
            'principal_name' => 'required|string|max:255',
            'student_count' => 'nullable|integer',
            'description' => 'nullable|string'
        ]);

        School::create($validated);

        return redirect()->route('schools.index')
            ->with('success', 'School created successfully. Awaiting admin approval.');
    }

    public function approve(School $school)
    {
        $school->is_approved = true;
        $school->save();

        return redirect()->route('schools.index')
            ->with('success', 'School approved successfully.');
    }

    public function show(School $school)
    {
        return view('schools.show', compact('school'));
    }

    public function edit(School $school)
    {
        return view('schools.edit', compact('school'));
    }

    public function update(Request $request, School $school)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'zip_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:schools,email,'.$school->id,
            'principal_name' => 'required|string|max:255',
            'student_count' => 'nullable|integer',
            'description' => 'nullable|string'
        ]);

        $school->update($validated);

        return redirect()->route('schools.index')
            ->with('success', 'School updated successfully.');
    }

    public function destroy(School $school)
    {
        $school->delete();
        return redirect()->route('schools.index')
            ->with('success', 'School deleted successfully.');
    }
}
