@extends('main')
@section('title', 'Add Address')
@section('content')

<div>
<form action="{{ route('address.create') }}" method="post">
        @csrf

        <label for="address">Address:</label>
        <input type="text" id="name" name="address" required>

        <button type="submit">Create address</button>
    </form>


    <h3>Addresses</h3>
    <ul>
    @foreach($addresses as $address)
        
            
            <li>
                {{ $address->address }}
                <form action="{{ route('address.delete', $address->id) }}" method="post">
                 @csrf
                 @method('DELETE')   
                <button type="submit">Delete</button>
                </form>
                <form action="{{ route('address.edit', $address->id) }}" method="GET">
                     @csrf
                    <button type="submit">Edit</button>
                </form>
                <form action="{{ route('address.showAssing', $address->id) }}" method="GET">
                    @csrf
                    <button type="submit">Assing User</button>
                </form>
            </li> 

    @endforeach
</ul>


</div>
@endsection