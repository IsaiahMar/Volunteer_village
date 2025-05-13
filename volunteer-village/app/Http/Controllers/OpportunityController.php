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
    public function index(Request $request): View
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