@extends('main')
@section('title', 'Add User')
@section('content')

<style>
    .print {
        display: flex;
        justify-content: space-between;
    }

    .form-container  {
        display: flex;
        justify-content: space-between;
        width: 13%;
    }
    
</style>

<div>
    <form action="{{ route('user.create') }}" method="post">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <button type="submit">Create user</button>
    </form>

    <h3>Users</h3>
    <ul>
    @foreach($users as $user)
        <li class="print">
            <div>
                {{ $user->name }} (Age: {{ $user->age }}, Email: {{ $user->email }}, Date of Birth: {{ $user->date_of_birth }}, Gender: {{ $user->gender }})
            </div>
            <div class="form-container">
                <form action="{{ route('user.delete', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')   
                    <button type="submit">Delete</button>
                </form>
                <form action="{{ route('user.edit', $user->id) }}" method="get">
                    @csrf
                    <button type="submit">Edit</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>
</div>

@endsection
