@extends('layouts.app')
@section('title', 'Edit Research Grant')
@section('content')
    <div class="container mt-4">
        <h1>Edit Research Grant</h1>
        
        <form action="{{ route('researchgrants.update', $milestone) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                    value="{{ old('name', $milestone->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="target_completion_date" class="form-label">Target Completion Date</label>
                <input type="date" class="form-control" id="target_completion_date" name="target_completion_date" 
                    value="{{ old('target_completion_date', $milestone->target_completion_date) }}" required>
            </div>

            <div class="mb-3">
                <label for="deliverable" class="form-label">Deliverable</label>
                <input type="text" class="form-control" id="deliverable" name="deliverable" 
                    value="{{ old('deliverable', $milestone->deliverable) }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Pending" {{ old('status', $milestone->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Progress" {{ old('status', $milestone->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ old('status', $milestone->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="remark" class="form-label">Remark</label>
                <textarea class="form-control" id="remark" name="remark" rows="3">{{ old('remark', $milestone->remark) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Research Grant</button>
            <a href="{{ route('researchgrants.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection