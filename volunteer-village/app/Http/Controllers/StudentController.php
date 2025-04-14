<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display the student home page.
     */
    public function home(): View
    {
    
        return view('student.StudentHome', ['verifiedHours' => []]);
    }

    /**
     * Display the student profile page.
     */
    public function profile(): View
    {
        return view('student.profile'); 
    }
}