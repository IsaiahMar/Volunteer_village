<?php
namespace App\Http\Controllers;

use App\Models\VolunteerOpportunity;
use Illuminate\Http\Request;

class OrganizationOpportunityController extends Controller
{
    public function index()
    {
        $opportunities = auth()->user()->opportunities; // Fetch opportunities created by the logged-in organization
        return view('organization.your_opportunities', compact('opportunities'));
    }

 

    public function edit($id)
    {
        $opportunity = VolunteerOpportunity::where('id', $id)
            ->where('organization_id', auth()->id())
            ->firstOrFail();

        return view('organization.edit_opportunity', compact('opportunity'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Date' => 'required|date',
            'Location' => 'required|string|max:255',
            'Max_students' => 'required|integer',
            'Description' => 'nullable|string',
        ]);

        $opportunity = VolunteerOpportunity::where('id', $id)
            ->where('organization_id', auth()->id())
            ->firstOrFail();

        $opportunity->update($request->all());

        return redirect()->route('organization.opportunities.index')->with('success', 'Opportunity updated successfully.');
    }

    public function destroy($id)
    {
        $opportunity = VolunteerOpportunity::where('id', $id)
            ->where('organization_id', auth()->id())
            ->firstOrFail();

        $opportunity->delete();

        return redirect()->route('organization.opportunities.index')->with('success', 'Opportunity deleted successfully.');
    }
}