@extends('layouts.app')
@section('title', 'Academicians')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Academicians</h1>
        <a href="{{ route('academicians.create') }}" class="btn btn-primary">Add New Academician</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Staff Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>College</th>
                <th>Department</th>
                <th>Position</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($academicians as $academician)
                <tr>
                    <td>{{ $academician->staff_number }}</td>
                    <td>{{ $academician->name }}</td>
                    <td>{{ $academician->email }}</td>
                    <td>{{ $academician->college }}</td>
                    <td>{{ $academician->department }}</td>
                    <td>{{ $academician->position }}</td>
                    <td>
                        <a href="{{ route('academicians.show', $academician) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('academicians.edit', $academician) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('academicians.destroy', $academician) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $academicians->links() }}
@endsection
