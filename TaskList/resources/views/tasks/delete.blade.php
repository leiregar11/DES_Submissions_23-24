@extends('main')

@section('content')

<section>
        <!-- List to display all tasks -->
        <ul>
            @foreach ($tasks as $task)
                <li>
                    {{ $task->name }}
                    <!-- Form to delete the task -->
                    @include('partials.delete', ['id' => $task->id])
                </li> 
            @endforeach
        </ul>
    </section>

@endsection