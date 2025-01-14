<?php

namespace App\Http\Controllers;

use App\Models\ProjectMilestone;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProjectMilestoneController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all milestones for a specific project
        $milestones = ProjectMilestone::paginate(10);
        return view('projectmilestones.index', compact('milestones'));
    }

    /**
     * Show the form for creating a new resource. 
     */
    public function create()
    {
        // Show form for creating a new milestone
        return view('projectmilestones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and create a new project milestone
        $request->validate([
            'name' => 'required|string|max:255',
            'target_completion_date' => 'required|date',
            'deliverable' => 'required|string|max:255',
            'status' => 'nullable|string|max:255',
            'remark' => 'nullable|string|max:255',
            'date_updated' => 'nullable|date',
        ]);

        // Create the milestone
        $milestone = ProjectMilestone::create($request->all());
        return response()->json($milestone, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectMilestone $projectMilestone)
    {
        return view('projectmilestones.show', compact('projectMilestone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectMilestone $milestone)
    {
        return view('projectmilestones.edit', compact('milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate and update the project milestone
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'target_completion_date' => 'sometimes|date',
            'deliverable' => 'sometimes|string|max:255',
            'status' => 'sometimes|string|max:255',
            'remark' => 'sometimes|string|max:255',
            'date_updated' => 'sometimes|date',
        ]);

        $milestone = ProjectMilestone::findOrFail($id);
        $milestone->update($request->all());
        return redirect()->route('milestones.index')->with('success', 'Milestone updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete the project milestone
        $milestone = ProjectMilestone::findOrFail($id);
        $milestone->delete();
        return response()->json(null, 204);
    }
}
