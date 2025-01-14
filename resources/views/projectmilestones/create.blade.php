

@extends('layouts.app')
@section('title', 'Add Milestone')
@section('content')
    <div class="container mt-4">
        <h1>Add Milestone</h1>
        
        <form action="{{ route('projectmilestones.store') }}" method="POST">
            @csrf
            <input type="hidden" name="research_grant_id" value="{{ $researchGrantId }}">

            <div class="mb-3">
                <label for="project_title" class="form-label">Milestone Name</label>
                <input type="text" class="form-control" id="name" name="milestone_name" required>
            </div>
            <div class="mb-3">
                <label for="grant_amount" class="form-label">Target Completion Date</label>
                <input type="number" step="0.01" class="form-control" id="completetion_date" name="completetion_date" required>
            </div>
            <div class="mb-3">
                <label for="grant_provider" class="form-label">Deliverable</label>
                <input type="text" class="form-control" id="Deliverable" name="Deliverable" required>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Status</label>
                <input type="date" class="form-control" id="Status" name="Status" required>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Remark</label>
                <input type="number" class="form-control" id="Remark" name="Remark" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Milestone</button>
            <a href="{{ route('researchgrants.show', ['research_grant_id' => $researchGrantId]) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
