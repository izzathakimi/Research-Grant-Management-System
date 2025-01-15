@extends('layouts.app')
@section('title', 'Academician Details')
@section('content')
    <div class="container mt-4 mb-5">
        <div class="academician-details mt-4 mb-5">
            <h1>Academician Details</h1>
            
            <h3>Name: {{ $academician->name }}</h3>
            <p><strong>Staff Number:</strong> {{ $academician->staff_number }}</p>
            <p><strong>Email:</strong> {{ $academician->email }}</p>
            <p><strong>College:</strong> {{ $academician->college }}</p>
            <p><strong>Department:</strong> {{ $academician->department }}</p>
            <p><strong>Position:</strong> {{ $academician->position }}</p>
        </div>

        <h3>Research Projects Involved</h3>
        <table class="table table-striped mb-5">
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Project Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $projects = DB::table('project_member_research_grant')
                        ->where('project_member_id', $academician->staff_number)
                        ->get();
                @endphp

                @forelse($projects as $project)
                <tr>
                    <td>{{ $project->research_grant_id }}</td>
                    <td>{{ DB::table('research_grants')->where('id', $project->research_grant_id)->value('project_title') }}</td>
                    <td>
                        <a href="{{ route('researchgrants.show', $project->research_grant_id) }}" 
                           class="btn btn-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No research projects found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <h3>Projects Led</h3>
        <table class="table table-striped mb-5">
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Project Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $projectsLed = DB::table('research_grants')
                        ->where('project_leader_id', $academician->staff_number)
                        ->select('id', 'project_title')
                        ->get();
                @endphp

                @forelse($projectsLed as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->project_title }}</td>
                    <td>
                        <a href="{{ route('researchgrants.show', $project->id) }}" 
                           class="btn btn-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No projects led found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('academicians.index') }}" class="btn btn-secondary">Back to Academicians</a>
    </div>
@endsection