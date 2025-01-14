<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectMember;
use App\Models\ResearchGrant;

class ProjectMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validate the request
        $validatedData = $request->validate([
            'staff_number' => 'required|exists:academicians,staff_number', // Ensure staff_number exists
            'research_grant_id' => 'required|exists:research_grants,id', // Ensure research_grant_id exists
        ]);

        // Create a new ProjectMember
        $projectMember = ProjectMember::create([
            'project_member_id' => $validatedData['staff_number'], // Set project_member_id to staff_number
            'research_grant_id' => $validatedData['research_grant_id'], // Set research_grant_id
            // other fields if necessary
        ]);

        return redirect()->back()->with('success', 'Project member added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $researchGrant = ResearchGrant::with('projectMembers.academician')->findOrFail($id);
        return view('researchgrants.show', compact('researchGrant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($project_member_id)
    {
        // Find the project member using project_member_id
        $projectMember = ProjectMember::where('project_member_id', $project_member_id)->firstOrFail();
        $projectMember->delete();

        return redirect()->back()->with('success', 'Project member deleted successfully.');
    }
}
