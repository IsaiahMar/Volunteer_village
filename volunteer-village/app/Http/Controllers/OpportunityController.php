<?php

namespace App\Http\Controllers;

use App\Models\VolunteerOpportunity;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OpportunityController extends Controller
{
    /**
     * Display a listing of all volunteer opportunities.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Fetch all opportunities from the database
        $opportunities = VolunteerOpportunity::all();

        // Return the view with the opportunities data
        return view('opportunities.index', compact('opportunities'));
    }
}