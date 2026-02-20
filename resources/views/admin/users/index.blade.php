<x-app-layout>
    <div class="flex justify-center mt-8">
        <div class="w-full max-w-6xl">
              <!-- Header Section -->
              <div class="flex justify-between items-center mb-4">
                  <h2 class="text-xl font-semibold">Users</h2>
                      <a href="{{ route('admin.users.create') }}" class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded">
                                + New User
                      </a>
              </div>
            <table id="simple-table" class="w-full" style="display:none;">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>Created on</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                             <span class="badge {{ $user->active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $user->active_label }}
                             </span>
                        </td>
                        <td>{{ $user->created_at->format('d M Y H:i A') }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-primary">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0"
                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<!--
// flex justify-center → Centers horizontally
// mt-8 → Adds spacing from top
// max-w-3xl → Prevents it from stretching full width
// w-full → Makes table responsive inside container
-->
