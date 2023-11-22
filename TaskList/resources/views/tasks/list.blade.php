@extends('main')
@section('title', 'Task List')
@section('content')

<section>
        <!-- List to display all tasks -->
        <ul>
            @each('partials.deleteButton',$tasks,'task','partials.empty-module')
            
        </ul>
    </section>

@endsection