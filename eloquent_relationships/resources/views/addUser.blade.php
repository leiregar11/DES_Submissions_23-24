<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
<form action="{{ route('user.create') }}" method="post">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <button type="submit">Create user</button>
    </form>


    <h3>Users</h3>
    <ul>
    @foreach($users as $user)
        <form action="{{ route('user.delete', $user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <li>
                {{ $user->name }}
                <button type="submit">Delete</button>
            </li> 
        </form>
    @endforeach
</ul>


</body>
</html>