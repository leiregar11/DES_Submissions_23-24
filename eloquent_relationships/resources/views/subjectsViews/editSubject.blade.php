@extends('main')
@section('title', 'Edit User')
@section('content')

<div>
    <h1>Edit subject</h1>

    <form action="{{ route('subject.update', $subject->id) }}" method="POST">
        @csrf
        @method('POST')


        <label for="subject">Name:</label>
        <input type="text" name="subject" value="{{ $subject->subject }}" required>


        <button type="submit">Update</button>
    </form>

    </div>
@endsection