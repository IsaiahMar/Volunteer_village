<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\VolunteerOpportunity;

class OrganizationController extends Controller
{
    public function index()
    {
        $organization = Organization::all();
        return view('organization.home', compact('organization'));
    }

    public function create()
    {
        return view('organization.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Org_name' => 'required|string|max:255',
            'Org_type' => 'required|string|max:255',
            'Contact_info' => 'required|string|max:255',
        ]);

        Organization::create([
            'Org_name' => $request->Org_name,
            'Org_type' => $request->Org_type,
            'Contact_info' => $request->Contact_info,
        ]);

        return redirect()->route('organization.home')->with('success', 'Organization created successfully.');
    }

    public function show($id)
    {
        $organization = Organization::findOrFail($id);
        return view('organization.show', compact('organization'));
    }

    public function edit($id)
    {
        $organization = Organization::findOrFail($id);
        return view('organization.edit', compact('organization'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Org_name' => 'required|string|max:255',
            'Org_type' => 'required|string|max:255',
            'Contact_info' => 'required|string|max:255',
        ]);

        $organization = Organization::findOrFail($id);
        $organization->update([
            'Org_name' => $request->Org_name,
            'Org_type' => $request->Org_type,
            'Contact_info' => $request->Contact_info,
        ]);

        return redirect()->route('organization.home')->with('success', 'Organization updated successfully.');
    }

    public function destroy($id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();

        return redirect()->route('organization.home')->with('success', 'Organization deleted successfully.');
    }

    // New methods for volunteer opportunities
    public function createOpportunity()
    {
        return view('organization.create_opportunity');
    }

    public function storeOpportunity(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Date' => 'required|date',
            'Location' => 'required|string|max:255',
            'Max_students' => 'required|integer',
            'Description' => 'nullable|string',
        ]);
    
        VolunteerOpportunity::create([
            'Name' => $request->Name,
            'Date' => $request->Date,
            'Location' => $request->Location,
            'Max_students' => $request->Max_students,
            'Description' => $request->Description,
        ]);
    
        return redirect()->route('organization.home')->with('success', 'Volunteer opportunity created successfully.');
    }
}