@extends('main')
@section('title', 'Add Task')
@section('content')

    <section>
    <form action="/task" method="post">
            @csrf
          
            <label for="task_name">Task Name:</label>
            <input type="text" name="name" id="task_name">
            <button type="submit">Add Task</button>
            @if(isset($texto) && $texto !== '')
            <p><span style="color: red;">{{ $texto }}</span></p>

            @endif

        </form>
        
    </section>

   

@endsection