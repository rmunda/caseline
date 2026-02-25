@use(App\Enums\UserRole)
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit User') }}</h2>
             <a href="{{ route('admin.users.index') }}" class="bg-gray-500 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded">
                                        Back
             </a>
        </div>
    </x-slot>

    <div class="flex justify-center mt-8">
        <div class="w-full max-w-xl">
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Password <span class="text-gray-400 text-xs">(leave blank to keep current)</span></label>
                    <input type="password" name="password"
                        class="w-full border rounded px-3 py-2">
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full border rounded px-3 py-2">
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Role</label>
                    <select name="role" class="w-full border rounded px-3 py-2">
                        <option value="{{ UserRole::Advocate->value }}" {{ old('role', $user->role) == UserRole::Advocate->value ? 'selected' : '' }}>Advocate</option>
                        <option value="{{ UserRole::Admin->value }}"    {{ old('role', $user->role) == UserRole::Admin->value    ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <!-- Active -->
                <div class="mb-4 flex items-center gap-2">
                    <input type="checkbox" name="active" id="active" value="1"
                        {{ old('active', $user->active) ? 'checked' : '' }}>
                    <label for="active" class="text-sm font-medium">Active</label>
                </div>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded w-full">
                    Update User
                </button>

            </form>
        </div>
    </div>
</x-app-layout>
