@extends('main')
@section('title', 'Add Post')
@section('content')

<style>
    /* Agrega estilos CSS para deshabilitar el redimensionamiento del textarea */
    #post {
        resize: none;
    }
</style>

<div>
    <h1>New Post</h1>
    
    <form action="{{ route('post.create') }}" method="post">
        @csrf

        <h3>Select the user this post belongs to</h3>
    <select name="userId" >
            <option selected>- Select a user -</option>
            @foreach($users as $user)
                <option value='{{$user->id}}'>{{$user->name}}</option>
            @endforeach
        </select>
    <h3 for="contenido">Add the content of the post:</h3>
    <textarea id="post" name="post" cols="40" rows="5" required></textarea>
        <h3>Select the subjects of the post</h3>
        <br>
        @foreach ($subjects as $subject)
            <input type="checkbox" name="subjects[]" value="{{$subject->id}}" id="subjects">
            <label for="{{$subject->id}}">{{$subject->subject}}</label>
        @endforeach
        <button type="submit">Create post</button>
    </form>

    <ul>
    @foreach($posts as $post)
        
            
            <li>
                <p>Owner of the post: {{$post->user->name}}</p>
                <p>Subjects of the post: </p>
                @if ($post->subject->count() > 0)
                    <ul>
                        @foreach ($post->subject as $subject)
                            <li>{{ $subject->subject }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No subjects are related to this post.</p>
                @endif

                <p>{{$post->post}}</p>
            
    
                <form action="{{ route('post.delete', $post->id) }}" method="post">
                 @csrf
                 @method('DELETE')   
                <button type="submit">Delete</button>
                </form>
                <form action="{{ route('post.edit', $post->id) }}" method="GET">
                            @csrf
                            <button type="submit">Editar</button>
                        </form>
                
            </li> 

    @endforeach
</ul>

</div>

@endsection
