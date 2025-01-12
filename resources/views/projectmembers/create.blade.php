@extends('layouts.app')
@section('title', 'Add Guardian')
@section('content')
    <h1>Add New Guardian</h1>
    
    <form action="{{ route('guardians.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="father" class="form-label">Father's Name</label>
            <input type="text" class="form-control" id="father" name="father" value="{{ old('father') }}" required>
        </div>
        <div class="mb-3">
            <label for="mother" class="form-label">Mother's Name</label>
            <input type="text" class="form-control" id="mother" name="mother" value="{{ old('mother') }}" required>
        </div>
        <div class="mb-3">
            <label for="contactNo" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contactNo" name="contactNo" value="{{ old('contactNo') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Guardian</button>
        <a href="{{ route('guardians.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection