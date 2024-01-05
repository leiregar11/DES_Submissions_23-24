@extends('main')
@section('title', 'Add subject')
@section('content')

<div>
<form action="{{ route('subject.create') }}" method="post">
        @csrf

        <label for="subject">Name:</label>
        <input type="text" id="subject" name="subject" required>

        <button type="submit">Create subject</button>
    </form>


    <h3>Subjects list</h3>
    <ul>
    @foreach($subjects as $subject)
        
            
            <li>
                {{ $subject->subject }}
                <form action="{{ route('subject.delete', $subject->id) }}" method="post">
                 @csrf
                 @method('DELETE')   
                <button type="submit">Delete</button>
                </form>
                <form action="{{ route('subject.edit', $subject->id) }}" method="GET">
                            @csrf
                            <button type="submit">Editar</button>
                        </form>
                
            </li> 

    @endforeach
</ul>


</div>
@endsection