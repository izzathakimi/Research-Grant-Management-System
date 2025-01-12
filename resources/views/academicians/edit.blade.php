@extends('layouts.app')
@section('title', 'Edit Child')
@section('content')
    <h1>Edit Child</h1>
    
    <form action="{{ route('children.update', $child) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Child's Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $child->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Child's Age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $child->age) }}" required>
        </div>
        <div class="mb-3">
            <label for="guardian_id" class="form-label">Guardian ID</label>
            <input type="text" class="form-control" id="guardian_id" name="guardian_id" value="{{ old('guardian_id', $child->guardian_id) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Child</button>
        <a href="{{ route('children.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection