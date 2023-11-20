@extends('main')
@section('title', 'Tasks')
@section('content')

    <section>
        <!-- Form to create a new task -->
        <form action="{{ route('store') }}" method="post">
            @csrf
            <label for="task_name">Task Name:</label>
            <input type="text" name="name" id="task_name" required>
            <button type="submit">Add Task</button>
        </form>
    </section>
    <section>
        <!-- List to display all tasks -->
        <ul>
            @foreach ($tasks as $task)
                <li>
                    
                    @include('partials.deleteButton', ['id' => $task->id])
                </li> 
            @endforeach
        </ul>
    </section>
   

@endsection