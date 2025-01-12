<?php

namespace App\Http\Controllers;

use App\Models\ResearchGrant;
use Illuminate\Http\Request;

class ResearchGrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all research grants with project leaders and members
        $researchGrants = ResearchGrant::with(['projectLeader', 'projectMembers'])->get();
        return response()->json($researchGrants);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and create a new research grant
        $request->validate([
            'grant_amount' => 'required|numeric',
            'grant_provider' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'project_leader_id' => 'required|string|exists:academicians,staff_number', // Ensure the project leader exists
            'project_members' => 'array', // Accept an array of project member IDs
            'project_members.*' => 'string|exists:academicians,staff_number', // Validate each member ID
        ]);

        $researchGrant = ResearchGrant::create($request->all());

        // Attach project members if provided
        if ($request->has('project_members')) {
            $researchGrant->projectMembers()->attach($request->project_members);
        }

        return response()->json($researchGrant, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch a specific research grant by ID with project leader and members
        $researchGrant = ResearchGrant::with(['projectLeader', 'projectMembers'])->findOrFail($id);
        return response()->json($researchGrant);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResearchGrant $researchGrant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate and update the research grant
        $request->validate([
            'grant_amount' => 'sometimes|required|numeric',
            'grant_provider' => 'sometimes|required|string|max:255',
            'project_title' => 'sometimes|required|string|max:255',
            'start_date' => 'sometimes|required|date',
            'duration' => 'sometimes|required|integer',
            'project_leader_id' => 'sometimes|required|string|exists:academicians,staff_number',
            'project_members' => 'array',
            'project_members.*' => 'string|exists:academicians,staff_number',
        ]);

        $researchGrant = ResearchGrant::findOrFail($id);
        $researchGrant->update($request->all());

        // Update project members if provided
        if ($request->has('project_members')) {
            $researchGrant->projectMembers()->sync($request->project_members); // Sync project members
        }

        return response()->json($researchGrant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete the research grant
        $researchGrant = ResearchGrant::findOrFail($id);
        $researchGrant->projectMembers()->detach(); // Detach members before deleting
        $researchGrant->delete();
        return response()->json(null, 204);
    }
}
