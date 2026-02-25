<a href="{{ route('clients.edit', $id) }}" class="text-blue-500 hover:text-blue-700">
    <i class="bi bi-pencil-square"></i>
</a>
<form action="{{ route('admin.clients.destroy', $id) }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-500 hover:text-red-700"
     onclick="return confirm('Are you sure you want to delete this client?')">
        <i class="bi bi-trash"></i>
    </button>
</form>