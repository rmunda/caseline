<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Manage Users') }}</h2>
            <a
                href="{{ route('admin.users.create') }}"
                class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded">
                + New User
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table id="simple-table" class="min-w-full" style="display: none">
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
                                    <td>{{ $user->role->name }}</td>
                                    <td>
                                        <span class="badge {{ $user->active ? 'bg-success' : 'bg-danger' }}">
                                            {{ $user->active_label }}
                                        </span>
                                    </td>
                                    <td class="text-gray-400">{{ $user->created_at->format('d M Y H:i A') }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-primary">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form
                                            action="{{ route('admin.users.destroy', $user->id) }}"
                                            method="POST"
                                            style="display: inline"
                                        >
                                            @csrf @method('DELETE')
                                            <button
                                                type="submit"
                                                class="btn btn-link text-danger p-0"
                                                onclick="return confirm('Are you sure you want to delete this user?')"
                                            >
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
            </div>
        </div>
    </div>
</x-app-layout>
