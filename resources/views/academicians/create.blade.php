@extends('layouts.app')
@section('title', 'Add New Child')
@section('content')
    <h1>Add New Child</h1>
    
    <form action="{{ route('children.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Child's Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Child's Age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}" required>
        </div>
        <div class="mb-3">
            <label for="guardian_id" class="form-label">Guardian ID</label>
            <input type="text" class="form-control" id="guardian_id" name="guardian_id" value="{{ old('guardian_id') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Child</button>
        <a href="{{ route('children.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection