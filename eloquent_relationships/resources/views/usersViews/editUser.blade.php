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
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <br>

        <label for="age">Age:</label>
        <input type="number" name="age" value="{{ $user->age }}" required>
        <br>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}" required>
        <br>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ $user->gender === 'other' ? 'selected' : '' }}>Other</option>
        </select>
        <br>

        <button type="submit">Update</button>
    </form>

</div>
@endsection
