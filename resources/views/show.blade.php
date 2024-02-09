@extends('layouts.main')

@section('content')
    <h2>User Details</h2>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $user->name }}</h5>
            <h5 class="card-text">Email: {{ $user->email }}</h5>
        </div>
    </div>
@endsection