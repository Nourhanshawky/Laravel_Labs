@extends('layouts.main')

@section('content')
    <h2>User Details</h2>
    
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $user->name }}</h5>
            <h5 class="card-text">Email: {{ $user->email }}</h5>
          
</div>
</div>
<h2 class="card-text">List of posts</h2>
    @forelse ($user->posts as $post)
    <div class="card mb-3">
    <ul>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->body }}</p>
                    </div>
                </div>
    @empty
        <li>No posts found.</li>
    @endforelse
</ul>


    
@endsection