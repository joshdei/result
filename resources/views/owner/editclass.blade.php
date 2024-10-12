<td>
    <a href="{{ route('classes.edit', $classRoom->id) }}" class="btn btn-warning">Edit</a>
    
    <form action="{{ route('classes.destroy', $classRoom->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this class?')">Delete</button>
    </form>
</td>
