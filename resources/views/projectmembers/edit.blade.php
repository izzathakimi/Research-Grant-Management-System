@extends('layouts.app')
@section('title', 'Edit Guardian')
@section('content')
    <h1>Edit Guardian</h1>
    
    <form action="{{ route('guardians.update', $guardian) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="father" class="form-label">Father's Name</label>
            <input type="text" class="form-control" id="father" name="father" value="{{ old('father', $guardian->father) }}" required>
        </div>
        <div class="mb-3">
            <label for="mother" class="form-label">Mother's Name</label>
            <input type="text" class="form-control" id="mother" name="mother" value="{{ old('mother', $guardian->mother) }}" required>
        </div>
        <div class="mb-3">
            <label for="contactNo" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contactNo" name="contactNo" value="{{ old('contactNo', $guardian->contactNo) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Guardian</button>
        <a href="{{ route('guardians.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection