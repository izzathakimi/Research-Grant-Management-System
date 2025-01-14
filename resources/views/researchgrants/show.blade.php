@extends('layouts.app')
@section('title', 'Research Grant Details')
@section('content')
    <div class="container mt-4 mb-5">
        <div class="research-grant-details mt-4 mb-5">
            <h1>Research Grant Details</h1>
            
            <h3>Grant Title: {{ $researchGrant->project_title }}</h3>
            <p><strong>Grant Amount:</strong> {{ $researchGrant->grant_amount }}</p>
            <p><strong>Grant Provider:</strong> {{ $researchGrant->grant_provider }}</p>
            <p><strong>Start Date:</strong> {{ $researchGrant->start_date }}</p>
            <p><strong>Duration:</strong> {{ $researchGrant->duration }} months</p>

        <p><strong>Project Leader ID:</strong> {{ $researchGrant->project_leader_id }}</p>

        <p><strong>Project Leader Name:</strong> {{ $researchGrant->projectLeader->name ?? 'N/A' }}</p>
        </div>

        <div class="add-project-member mb-5 mt-5">
                <!-- Form to add new project member -->
        <h4>Add Project Member</h4>
        <form action="{{ route('project-members.store') }}" method="POST">
            @csrf
            <input type="hidden" name="research_grant_id" value="{{ $researchGrant->id }}">
            <label for="staff_number">Staff Number</label>
            <input type="text" name="staff_number" id="staff_number" required>
            <button type="submit">Add Member</button>
        </form>
        </div>
        <h3>Project Members</h3>
        <table class="table table-striped mb-5">
            <thead>
                <tr>
                    <th>Staff Number</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="projectMembersTable">
       @foreach($researchGrant->projectMembers as $member)
       <tr>
           <td>{{ $member->project_member_id }}</td>
           <td>{{ $member->academician ? $member->academician->name : 'N/A' }}</td>
           <td>{{ $member->academician ? $member->academician->email : 'N/A' }}</td>
           <td>
               <form action="{{ route('project-members.destroy', $member->project_member_id) }}" method="POST" style="display:inline;">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure you want to delete this member?');">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                           <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                       </svg>
                   </button>
               </form>
           </td>
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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('researchgrants.index') }}" class="btn btn-secondary">Back to Grants</a>
    </div>
@endsection