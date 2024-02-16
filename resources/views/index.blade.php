@extends('layouts.main')
@section('content')
    <h1>Users List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number of posts</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->posts_count }}</td>

                <td>
                        <!-- <a href="{{ route('user.show', $user->id) }}" class="btn btn-info">View</a> -->
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        <!-- Add the delete button with a form -->
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$users->links()}}
@endsection

@section('title', 'Users List')
