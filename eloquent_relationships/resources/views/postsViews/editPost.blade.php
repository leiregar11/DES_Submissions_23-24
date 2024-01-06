@extends('main')
@section('title', 'Edit Post')
@section('content')

<style>
    /* Agrega estilos CSS para deshabilitar el redimensionamiento del textarea */
    #post {
        resize: none;
    }
</style>

    <h1>Edit post</h1>

    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('POST')


        <label for="post">Edit your post:</label>
        <input type="text" name="post"  cols="40" rows="5" value="{{ $post->post }}" required>


        <button type="submit">Update</button>
    </form>

    </div>
@endsection