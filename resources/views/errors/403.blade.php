@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body text-center">
                    <h1 class="text-danger">You have no permission!</h1>
                    <p class="mt-3">You don't have the required permissions to access this page.</p>
                    <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 