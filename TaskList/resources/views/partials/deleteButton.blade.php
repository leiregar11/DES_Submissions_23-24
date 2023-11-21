<form action="/task/{{ $task->id }}" method="post">
    @csrf
    @method('DELETE')
<li>
{{ $task->name }}<button type="submit">Delete</button>

</li> 
</form>