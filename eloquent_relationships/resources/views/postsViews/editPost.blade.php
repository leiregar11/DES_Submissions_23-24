@extends('main')
@section('title', 'Edit User')
@section('content')

<div>
    <h1>Edit post</h1>

    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('POST')


        <label for="post">Edit your post:</label>
        <input type="text" name="post" value="{{ $post->post }}" required>
        <textarea id="post" name="post" cols="40" rows="5" value="{{ $post->post }}" required></textarea>


        <button type="submit">Update</button>
    </form>

    </div>
@endsection