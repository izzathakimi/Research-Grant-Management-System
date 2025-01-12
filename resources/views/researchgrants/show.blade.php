@extends('layouts.app')
@section('title', 'Assessment Details')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Assessment Details</h1>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Assessment ID:</div>
                <div class="col-md-9">{{ $assessment->id }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Student ID:</div>
                <div class="col-md-9">{{ $assessment->student_id }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Marks:</div>
                <div class="col-md-9">{{ $assessment->marks }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Assessment Type:</div>
                <div class="col-md-9">{{ $assessment->assessment_type }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Subject Code:</div>
                <div class="col-md-9">{{ $assessment->subject_code }}</div>
            </div>

            <!-- Display Assessment's Subjects and Enrolled Students -->
            <h3 class="mt-4">Subjects and Enrolled Students</h3>
            @if($assessment->subject)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Description</th>
                            <th>Enrolled Students</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $assessment->subject->subject_code }}</td>
                            <td>{{ $assessment->subject->name }}</td>
                            <td>{{ $assessment->subject->description }}</td>
                            <td>
                                @if($assessment->subject->students->count() > 0)
                                    <ul>
                                        @foreach($assessment->subject->students as $student)
                                            <li>{{ $student->name }} ({{ $student->email }})</li>
                                        @endforeach
                                    </ul>
                                @else
                                    No students enrolled
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">
                    This assessment is not associated with any subjects yet.
                </div>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('assessments.edit', $assessment) }}" class="btn btn-warning">Edit Assessment</a>
            <a href="{{ route('assessments.index') }}" class="btn btn-secondary">Back to List</a>
            <form action="{{ route('assessments.destroy', $assessment) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this assessment?')">
                    Delete Assessment
                </button>
            </form>
        </div>
    </div>
@endsection