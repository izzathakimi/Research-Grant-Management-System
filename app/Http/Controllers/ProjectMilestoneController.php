<?php

namespace App\Http\Controllers;

use App\Models\ProjectMilestone;
use App\Models\ResearchGrant;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

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
    public function create(Request $request)
    {
        if (! Gate::allows('manage-project-milestones')) {
            return $this->unauthorized();
        }
        $researchGrantId = $request->query('research_grant_id');
        
        if (!$researchGrantId) {
            return redirect()->back()->with('error', 'Research Grant ID is required');
        }
        
        $researchGrant = \App\Models\ResearchGrant::findOrFail($researchGrantId);
        
        return view('projectmilestones.create', [
            'researchGrantId' => $researchGrantId,
            'researchGrant' => $researchGrant
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Gate::allows('manage-project-milestones')) {
            return $this->unauthorized();
        }
        $validatedData = $request->validate([
            'research_grant_id' => 'required|exists:research_grants,id',
            'name' => 'required',
            'target_completion_date' => 'required|date',
            'deliverable' => 'required',
            'status' => 'required',
            'remark' => 'nullable'
        ]);

        $milestone = \App\Models\ProjectMilestone::create($validatedData);

        return redirect()
            ->route('researchgrants.show', ['researchgrant' => $request->research_grant_id])
            ->with('success', 'Milestone created successfully');
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
        if (! Gate::allows('manage-project-milestones')) {
            return $this->unauthorized();
        }
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
        if (! Gate::allows('manage-project-milestones')) {
            return $this->unauthorized();
        }
        // Delete the project milestone
        $milestone = ProjectMilestone::findOrFail($id);
        $milestone->delete();
        return response()->json(null, 204);
    }
}
