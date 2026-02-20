@use(App\Enums\UserRole)
<x-app-layout>
    <div class="flex justify-center mt-8">
        <div class="w-full max-w-xl">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">New User</h2>
                <a href="{{ route('admin.users.index') }}" class="bg-gray-500 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded">
                    Back
                </a>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white p-6 rounded">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Role</label>
                    <select name="role" class="w-full border rounded px-3 py-2">
                        <option value="{{ UserRole::Advocate->value }}"  {{ old('role') == UserRole::Advocate->value  ? 'selected' : '' }}>Advocate</option>
                        <option value="{{ UserRole::Admin->value }}" {{ old('role') == UserRole::Admin->value ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <!-- Active -->
                <div class="mb-4 flex items-center gap-2">
                    <input type="checkbox" name="active" id="active" value="1"
                        {{ old('active', true) ? 'checked' : '' }}>
                    <label for="active" class="text-sm font-medium">Active</label>
                </div>

                <button type="submit"
                    class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded w-full">
                    Create User
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
