
@extends('layouts.main')

@section('content')
    <h1>Posts List</h1>
    @if (session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p><span class="font-weight-bold">Published at:</span> {{ $post->published_at->format('d-m-y h:i a') }}</p>

                    <p class="card-text">{{ $post->body }}</p>
                    @if ($post->user)
                        <p class="card-text"><span class="font-weight-bold">Written by:</span> {{ $post->user->name }}</p>
                        <p class="card-text"><span class="font-weight-bold">Email:</span> {{ $post->user->email }}</p>
                    @else
                        <p class="card-text"><span class="font-weight-bold">Written by:</span> Unknown User</p>
                    @endif
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Update</a>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </div>
            </div>
        </div>
       
        @endforeach
    </div>
    
{{ $posts->links() }}
@endsection

@section('title', 'Posts List')
