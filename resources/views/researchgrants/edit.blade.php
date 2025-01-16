@extends('layouts.app')
@section('title', 'Edit Research Grant')
@section('content')
    <div class="container mt-4">
        <h1>Edit Research Grant</h1>
        
        <form action="{{ route('researchgrants.update', $researchGrant) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="project_title" class="form-label">Project Title</label>
                <input type="text" class="form-control" id="project_title" name="project_title" value="{{ old('project_title', $researchGrant->project_title) }}" required>
            </div>
            <div class="mb-3">
                <label for="grant_amount" class="form-label">Grant Amount</label>
                <input type="number" step="0.01" class="form-control" id="grant_amount" name="grant_amount" value="{{ old('grant_amount', $researchGrant->grant_amount) }}" required>
            </div>
            <div class="mb-3">
                <label for="grant_provider" class="form-label">Grant Provider</label>
                <input type="text" class="form-control" id="grant_provider" name="grant_provider" value="{{ old('grant_provider', $researchGrant->grant_provider) }}" required>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $researchGrant->start_date->format('Y-m-d')) }}" required>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration (Months)</label>
                <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration', $researchGrant->duration) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="project_leader_id" class="form-label">Project Leader</label>
                <select name="project_leader_id" id="project_leader_id" class="form-select" required>
                    <option value="">Select Project Leader</option>
                    @php
                        $academicians = DB::table('academicians')->select('staff_number', 'name')->get();
                    @endphp
                    @foreach($academicians as $academician)
                        <option value="{{ $academician->staff_number }}" 
                            {{ old('project_leader_id', $researchGrant->project_leader_id) == $academician->staff_number ? 'selected' : '' }}>
                            {{ $academician->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Research Grant</button>
            <a href="{{ route('researchgrants.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection