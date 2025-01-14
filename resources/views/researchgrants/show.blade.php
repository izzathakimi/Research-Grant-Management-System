@extends('layouts.app')
@section('title', 'Research Grant Details')
@section('content')
    <div class="container mt-4">
        <h1>Research Grant Details</h1>
        
        <h3>Grant Title: {{ $researchGrant->project_title }}</h3>
        <p><strong>Grant Amount:</strong> {{ $researchGrant->grant_amount }}</p>
        <p><strong>Grant Provider:</strong> {{ $researchGrant->grant_provider }}</p>
        <p><strong>Start Date:</strong> {{ $researchGrant->start_date }}</p>
        <p><strong>Duration:</strong> {{ $researchGrant->duration }} months</p>
        

        <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
            <div class="d-flex align-items-center">
            <h3 class="mt-5">Project Members</h3>                
            <a href="{{ route('projectmembers.create') }}" class="btn btn-primary btn-lg">+</a>
            </div>
        </div>

        <table class="table table-striped mb-5">
            <thead>
                <tr>
                    <th>Staff Number</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($researchGrant->projectMembers as $member)
                    <tr>
                        <td>{{ $member->staff_number }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Project Milestones</h3>
        <table class="table table-striped mb-5">
            <thead>
                <tr>
                    <th>Milestone Name</th>
                    <th>Target Completion Date</th>
                    <th>Deliverable</th>
                    <th>Status</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($researchGrant->milestones as $milestone)
                    <tr>
                        <td>{{ $milestone->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($milestone->target_completion_date)->format('Y-m-d') }}</td>
                        <td>{{ $milestone->deliverable }}</td>
                        <td>{{ $milestone->status ?? 'N/A' }}</td>
                        <td>{{ $milestone->remark ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('researchgrants.index') }}" class="btn btn-secondary">Back to Grants</a>
    </div>
@endsection