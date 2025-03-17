<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function home()
{
    $verifiedHours = []; // Fetch verified hours from the database
    return view('StudentHome', compact('verifiedHours'));
}

public function profile()
{
    return view('profile');
}

public function logout(Request $request)
{

}
}

