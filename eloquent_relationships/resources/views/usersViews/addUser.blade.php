@extends('main')
@section('title', 'Add User')
@section('content')

<div>
<form action="{{ route('user.create') }}" method="post">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <button type="submit">Create user</button>
    </form>


    <h3>Users</h3>
    <ul>
    @foreach($users as $user)
        
            
            <li>
                {{ $user->name }}
                <form action="{{ route('user.delete', $user->id) }}" method="post">
                 @csrf
                 @method('DELETE')   
                <button type="submit">Delete</button>
                </form>
                <form action="{{ route('user.edit', $user->id) }}" method="get">
                            @csrf
                            <button type="submit">Editar</button>
                        </form>
                
            </li> 

    @endforeach
</ul>


</div>
@endsection