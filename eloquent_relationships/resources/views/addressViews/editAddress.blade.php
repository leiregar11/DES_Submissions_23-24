@extends('main')
@section('title', 'Assing address')
@section('content')

<div>
    

    <h1>Edit address</h1>

    <form action="{{ route('address.update', $address->id) }}" method="POST">
        @csrf
        @method('POST')


        <label for="name">Addres:</label>
        <input type="text" name="address" value="{{ $address->address }}" required>


        <button type="submit">Update</button>
    </form>

    </div>
@endsection