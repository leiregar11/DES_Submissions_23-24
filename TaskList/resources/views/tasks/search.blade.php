@extends('main')
@section('title', 'Search Task')
@section('content')

    <section>
        <!-- Form to create a new task -->
        <form action="/task" method="post">
            @csrf
            <label for="task_name">Task Name:</label>
            <input type="text" name="name" id="task_name" required>
            <button type="submit">Add Task</button>
        </form>
    </section>

   

@endsection