@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form method="POST" action="{{ route('user.store') }}">
    @csrf
    <div class="form-group">
            <label class="form-label">UserName</label>
            <input class="form-control w-50" type="text" name="name" value="">
        </div>
    <div class="form-group">
            <label class="form-label">Email</label>
            <input class="form-control w-50" type="email" name="email" value="">
        </div>

        <div class="form-group">
            <label class="form-label">Password</label>
            <input class="form-control w-50" type="password" name="password" >
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        </div>
    </form>
</body>
</html>
@endsection
