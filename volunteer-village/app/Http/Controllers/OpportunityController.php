<?php

namespace App\Http\Controllers;

use App\Models\VolunteerOpportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    /**
     * Display a listing of all volunteer opportunities.
     *
     * @return \Illuminate\View\View
     */
    public function listAll()
    {
        // Fetch all opportunities from the database
        $opportunities = VolunteerOpportunity::all();

        // Return the view with the opportunities data
        return view('opportunities.index', compact('opportunities'));
    }
    public function index(Request $request)
{
    $query = VolunteerOpportunity::query();

    if ($request->filled('name')) {
        $query->where('Name', 'LIKE', '%' . $request->name . '%');
    }

    if ($request->filled('location')) {
        $query->where('Location', $request->location);
    }

    if ($request->filled('date_from')) {
        $query->whereDate('Date', '>=', $request->date_from);
    }

    if ($request->filled('date_to')) {
        $query->whereDate('Date', '<=', $request->date_to);
    }

    $opportunities = $query->get();
    $locations = VolunteerOpportunity::select('Location')->distinct()->pluck('Location');

    return view('opportunities.index', compact('opportunities', 'locations'));
}

}