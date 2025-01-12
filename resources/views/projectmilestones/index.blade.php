@extends('layouts.app')
@section('title', 'Project Milestones')
@section('content')
    <div class="container mt-4">
        <div class="d-flex align-items-center">
            <h1 class="mb-0 ms-3 me-2">Project Milestones</h1>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Research Grant ID</th>
                    <th>Milestone Name</th>
                    <th>Target Completion Date</th>
                    <th>Deliverable</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($milestones as $milestone)
                    <tr>
                        <td>{{ $milestone->research_grant_id }}</td>
                        <td>{{ $milestone->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($milestone->target_completion_date)->format('Y-m-d') }}</td>                        <td>{{ $milestone->deliverable }}</td>
                        <td>{{ $milestone->status ?? 'N/A' }}</td>
                        <td>{{ $milestone->remark ?? 'N/A' }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('milestones.show', $milestone) }}" 
                                class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('milestones.edit', $milestone) }}" 
                                class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('milestones.destroy', $milestone) }}" 
                                                method="POST" 
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $milestones->links() }}
    </div>
@endsection
