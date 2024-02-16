@extends('layouts.main')

@section('content')
    <h2>Edit Post</h2>

    
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label for="email">Body:</label>
            <input type="text" name="body" class="form-control" value="{{ $post->body }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update User</button>
    </form>
@endsection

