@extends('layouts.app')
@section('title', 'Guardians')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Guardians</h1>
        <a href="{{ route('guardians.create') }}" class="btn btn-primary">Add New Guardian</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Father's Name</th>
                <th>Mother's Name</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guardians as $guardian)
                <tr>
                    <td>{{ $guardian->father }}</td>
                    <td>{{ $guardian->mother }}</td>
                    <td>{{ $guardian->contactNo }}</td>
                    <td>
                        <a href="{{ route('guardians.show', $guardian) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('guardians.edit', $guardian) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('guardians.destroy', $guardian) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $guardians->links() }}
@endsection
