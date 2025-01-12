@extends('layouts.app')
@section('title', 'Child Details')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Child Details</h1>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Child ID:</div>
                <div class="col-md-9">{{ $child->id }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Name:</div>
                <div class="col-md-9">{{ $child->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Age:</div>
                <div class="col-md-9">{{ $child->age }}</div>
            </div>

            <!-- Display Guardians -->
            <h3 class="mt-4">Guardians</h3>
            @if($child->guardians->count() > 0)
                <ul>
                    @foreach($child->guardians as $guardian)
                        <li>
                            Father's Name: {{ $guardian->father }}, 
                            Mother's Name: {{ $guardian->mother }}
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="alert alert-info">
                    No guardians associated with this child.
                </div>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('children.edit', $child) }}" class="btn btn-warning">Edit Child</a>
            <a href="{{ route('children.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
@endsection