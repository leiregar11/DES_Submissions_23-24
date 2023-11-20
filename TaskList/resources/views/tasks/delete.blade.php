@extends('main')
@section('title', 'Task List')
@section('content')

<section>
        <!-- List to display all tasks -->
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <!-- Form to delete the task -->
                    @include('partials.deleteButton', ['id' => $task->id])
                </li> 
            @endforeach
        </ul>
    </section>

@endsection