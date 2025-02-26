@extends('layouts.app')
@section('title', 'Add Research Grant')
@section('content')
    <div class="container mt-4">
        <h1>Add New Research Grant</h1>
        
        <form action="{{ route('researchgrants.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="project_title" class="form-label">Project Title</label>
                <input type="text" class="form-control" id="project_title" name="project_title" value="{{ old('project_title') }}" required>
            </div>
            <div class="mb-3">
                <label for="grant_amount" class="form-label">Grant Amount</label>
                <input type="number" step="0.01" class="form-control" id="grant_amount" name="grant_amount" value="{{ old('grant_amount') }}" required>
            </div>
            <div class="mb-3">
                <label for="grant_provider" class="form-label">Grant Provider</label>
                <input type="text" class="form-control" id="grant_provider" name="grant_provider" value="{{ old('grant_provider') }}" required>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration (Months)</label>
                <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" required>
            </div>
            <div class="mb-3">
                <label for="project_leader_id" class="form-label">Project Leader ID</label>
                <input type="text" class="form-control" id="project_leader_id" name="project_leader_id" value="{{ old('project_leader_id') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Research Grant</button>
            <a href="{{ route('researchgrants.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection