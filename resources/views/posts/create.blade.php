@extends('layouts.main')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Create User</title>
</head>
<h1>Create Post</h1>
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
            <label class="form-label">Post Title</label>
            <input class="form-control w-50" type="text" name="title" value="">
        </div>
    <div class="form-group">
            <label class="form-label">Slug</label>
            <input class="form-control w-50" type="text" name="slug" value="">
        </div>
    <div class="form-group">
            <label class="form-label">What do you think?</label>
            <textarea class="form-control w-50" name="body" rows="5"></textarea>
        </div>
            <div class="mb-3 w-25">
        <label for="formFile" class="form-label">choose post image</label>
        <input class="form-control" type="file" id="formFile" name='image'>
        </div>

        <!-- <label for="user"> Choose the Writer of the post:</label>
        <select name="user_id" id="user_id" required>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select> -->
    <!-- <label for="user"> Your post published with name:</label>
    <p>{{ auth()->user()->name }}</p> -->
        <div class="form-group">
            <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        </div>
    </form>
    @endsection