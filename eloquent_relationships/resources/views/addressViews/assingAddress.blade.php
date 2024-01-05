@extends('main')
@section('title', 'Assing address')
@section('content')

<div>
    

    <h1>Edit address</h1>

    <form action="{{ route('address.assing', $address->id) }}" method="POST">
        @csrf

        <label for="name">Addres:</label>
        <input type="text" name="address" value="{{ $address->address }}" required>
        <select name="name">
            <option selected>- Select a user -</option>
            @foreach($users as $user)
                <option value='{{$user->name}}'>{{$user->name}}</option>
            @endforeach
        </select>

        <button type="submit">Update</button>
    </form>

    </div>

</div>
@endsection