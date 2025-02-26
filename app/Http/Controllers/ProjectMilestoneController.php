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
        
        // Get the associated research grant
        $researchGrant = $milestone->researchGrant;
        
        return view('projectmilestones.edit', compact('milestone', 'researchGrant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('manage-project-milestones')) {
            return $this->unauthorized();
        }

        // Validate and update the project milestone
        $request->validate([
            'name' => 'required|string|max:255',
            'target_completion_date' => 'required|date',
            'deliverable' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'remark' => 'nullable|string|max:255',
        ]);

        $milestone = ProjectMilestone::findOrFail($id);
        $milestone->update($request->all());

        // Get the research grant ID for redirect
        $researchGrantId = $milestone->research_grant_id;

        // Redirect to the research grant show page
        return redirect()->route('researchgrants.show', $researchGrantId)
            ->with('success', 'Milestone updated successfully.');
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
