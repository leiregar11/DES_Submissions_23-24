@extends('main')
@section('title', 'Search Tasks')
@section('content')

    <section>
        <!-- Form to create a new task -->
        <form action="{{ route('search') }}" method="get">
            @csrf
            <label for="task_name">Search Tasks:</label>
            <input type="text" name="name" id="task_name" required>
            <button type="submit">Search</button>
        </form>
    </section>
    <section>
        <!-- List to display all tasks -->
        @if($tasks->isEmpty())
            <p>No results found for your search.</p>
        @else
        <ul>
            @foreach ($tasks as $task)
                <li>
                    
                    @include('partials.deleteButton', ['id' => $task->id])
                </li> 
            @endforeach
        </ul>
        @endif
    </section>
   

@endsection