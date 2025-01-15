<?php

namespace App\Http\Controllers;

use App\Models\ResearchGrant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ResearchGrantController extends Controller
{
    /**
     * Display a listing of the research grants
     */
    public function index()
    {
        $researchGrants = ResearchGrant::with('projectLeader')->paginate(10); // Eager load projectLeader
        return view('researchgrants.index', compact('researchGrants')); // Return the view
    }

    /**
     * Show the form for creating a new research grant
     */
    public function create()
    {
        if (! Gate::allows('manage-research-grants')) {
            abort(403);
        }
        return view('researchgrants.create'); // Return the create view
    }

    /**
     * Store a newly created research grant in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'grant_amount' => 'required|numeric',
            'grant_provider' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'project_leader_id' => 'required|exists:academicians,staff_number',
        ]);

        ResearchGrant::create($request->all()); // Create the research grant

        return redirect()->route('researchgrants.index')->with('success', 'Research Grant created successfully.'); // Redirect to index
    }

    /**
     * Show the form for editing the specified research grant
     */
    public function edit($id)
    {
        $researchGrant = ResearchGrant::findOrFail($id); // Find the research grant
        if (! Gate::allows('manage-research-grants')) {
            abort(403);
        }
        
        return view('researchgrants.edit', compact('researchGrant'));
    }

    /**
     * Update the specified research grant in storage
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'grant_amount' => 'required|numeric',
            'grant_provider' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'project_leader_id' => 'required|exists:academicians,staff_number',
        ]);

        $researchGrant = ResearchGrant::findOrFail($id); // Find the research grant
        $researchGrant->update($request->all()); // Update the research grant

        return redirect()->route('researchgrants.index')->with('success', 'Research Grant updated successfully.'); // Redirect to index
    }

    /**
     * Remove the specified research grant from storage
     */
    public function destroy($id)
    {
        $researchGrant = ResearchGrant::findOrFail($id); // Find the research grant
        if (! Gate::allows('manage-research-grants')) {
            abort(403);
        }
        
        $researchGrant->delete(); // Delete the research grant

        return redirect()->route('researchgrants.index')->with('success', 'Research Grant deleted successfully.'); // Redirect to index
    }

    /**
     * Show the details of the specified research grant
     */
    public function show($id)
    {
        $researchGrant = ResearchGrant::with(['projectMembers', 'milestones'])->findOrFail($id); // Eager load project members and milestones
        return view('researchgrants.show', compact('researchGrant'));
    }
}
