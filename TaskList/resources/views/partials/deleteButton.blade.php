<form action="/task/{{ $task->id }}" method="post">
    @csrf
    @method('DELETE')
    {{ $task->name }}<button type="submit">Delete</button>
</form>