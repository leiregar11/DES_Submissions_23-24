<form action="/task/{{ $task->id }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>