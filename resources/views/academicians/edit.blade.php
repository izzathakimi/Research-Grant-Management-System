@extends('layouts.app')
@section('title', 'Edit Academician')
@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Academician</h1>
        
        <form action="{{ route('academicians.update', $academician) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="staff_number" class="form-label">Staff Number</label>
                <input type="text" class="form-control" id="staff_number" name="staff_number" value="{{ old('staff_number', $academician->staff_number) }}" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $academician->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $academician->email) }}" required>
            </div>
            <div class="mb-3">
                <label for="college" class="form-label">College</label>
                <input type="text" class="form-control" id="college" name="college" value="{{ old('college', $academician->college) }}" required>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control" id="department" name="department" value="{{ old('department', $academician->department) }}" required>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position" value="{{ old('position', $academician->position) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Academician</button>
            <a href="{{ route('academicians.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection