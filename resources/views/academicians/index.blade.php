@extends('layouts.app')
@section('title', 'Children')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Children</h1>
        <a href="{{ route('children.create') }}" class="btn btn-primary">Add New Child</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Guardian ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($children as $child)
                <tr>
                    <td>{{ $child->name }}</td>
                    <td>{{ $child->age }}</td>
                    <td>{{ $child->guardian_id }}</td>
                    <td>
                        <a href="{{ route('children.show', $child) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('children.edit', $child) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('children.destroy', $child) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $children->links() }}
@endsection
