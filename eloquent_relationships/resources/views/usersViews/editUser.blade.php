@extends('main')
@section('title', 'Edit User')
@section('content')

<div>
    <h1>Edit user</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $user->name }}" required>


        <button type="submit">Update</button>
    </form>

    </div>
@endsection