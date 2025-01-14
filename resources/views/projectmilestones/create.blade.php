@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Add Milestone</h2>

    <form action="{{ route('projectmilestones.store') }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="research_grant_id" value="{{ $researchGrant->id }}">

        <div class="form-group mb-3">
            <label for="name">Milestone Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group mb-3">
            <label for="target_completion_date">Target Completion Date</label>
            <input type="date" class="form-control" id="target_completion_date" name="target_completion_date" required>
        </div>

        <div class="form-group mb-3">
            <label for="deliverable">Deliverable</label>
            <textarea class="form-control" id="deliverable" name="deliverable" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="remark">Remarks</label>
            <textarea class="form-control" id="remark" name="remark"></textarea>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Create Milestone</button>
            <a href="{{ route('researchgrants.show', ['researchgrant' => $researchGrant->id]) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
