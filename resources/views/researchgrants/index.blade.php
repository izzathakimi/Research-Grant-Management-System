@extends('layouts.app')
@section('title', 'Research Grants')
@section('content')
    <div class="container mt-4">
        <div class="d-flex align-items-center">
            <h1 class="mb-0 ms-3 me-2">Research Grants</h1>
            <a href="{{ route('researchgrants.create') }}" class="btn btn-primary btn-lg">+</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Project Title</th>
                    <th>Grant Amount</th>
                    <th>Grant Provider</th>
                    <th>Start Date</th>
                    <th>Duration (Months)</th>
                    <th>Project Leader</th>
                    <th style="width: 200px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($researchGrants as $grant)
                    <tr>
                        <td>{{ $grant->project_title }}</td>
                        <td>{{ number_format($grant->grant_amount, 2) }}</td>
                        <td>{{ $grant->grant_provider }}</td>
                        <td>{{ $grant->start_date->format('Y-m-d') }}</td>
                        <td>{{ $grant->duration }}</td>
                        <td>{{ $grant->projectLeader->name ?? 'N/A' }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('researchgrants.show', $grant) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('researchgrants.edit', $grant) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('researchgrants.destroy', $grant) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $researchGrants->links() }}
    </div>
@endsection
