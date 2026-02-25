@use(App\Enums\Gender)
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            {{-- Changed title to "Edit Client" --}}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Client') }}</h2>
            <a href="{{ route('clients.index') }}" class="bg-gray-500 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded">
                Back
            </a>
        </div>
    </x-slot>

    <div class="flex justify-center mt-12">
        <div class="w-full max-w-2xl">
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- 1. Updated action to route('clients.update', $client->id) --}}
            <form action="{{ route('clients.update', $client->id) }}" method="POST" class="bg-white p-6 rounded shadow">
                @csrf
                {{-- 2. Added PUT method spoofing --}}
                @method('PUT')

                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">First Name</label>
                        {{-- 3. Values now check old() first, then fall back to $client property --}}
                        <input type="text" name="first_name" value="{{ old('first_name', $client->first_name) }}"
                            class="w-full border rounded px-3 py-2" maxlength="50" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Middle Name</label>
                        <input type="text" name="middle_name" value="{{ old('middle_name', $client->middle_name) }}"
                            class="w-full border rounded px-3 py-2" maxlength="50">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name', $client->last_name) }}"
                            class="w-full border rounded px-3 py-2" maxlength="50" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Gender</label>
                        <select name="gender" class="w-full border rounded px-3 py-2" required>
                            <option value="">— Select Gender —</option>
                            @foreach (Gender::cases() as $gender)
                                <option value="{{ $gender->value }}" 
                                    {{ old('gender', $client->gender->value ?? $client->gender) == $gender->value ? 'selected' : '' }}>
                                    {{ $gender->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Date of Birth</label>
                        <input type="date" name="dob" value="{{ old('dob', $client->dob?->format('Y-m-d') ?? $client->dob) }}"
                            class="w-full border rounded px-3 py-2" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Address Line 1</label>
                    <input type="text" name="address_line_1" value="{{ old('address_line_1', $client->address_line_1) }}"
                        class="w-full border rounded px-3 py-2" maxlength="100" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Address Line 2</label>
                    <input type="text" name="address_line_2" value="{{ old('address_line_2', $client->address_line_2) }}"
                        class="w-full border rounded px-3 py-2" maxlength="100">
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium mb-1">City / Town</label>
                        <input type="text" name="city_town" value="{{ old('city_town', $client->city_town) }}"
                            class="w-full border rounded px-3 py-2" maxlength="50" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">District</label>
                        <input type="text" name="district" value="{{ old('district', $client->district) }}"
                            class="w-full border rounded px-3 py-2" maxlength="50" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">State</label>
                        <select name="state" class="w-full border rounded px-3 py-2" required>
                            <option value="">— Select State —</option>
                            @php
                                $states = ['Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chhattisgarh', 'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jharkhand', 'Karnataka', 'Kerala', 'Madhya Pradesh', 'Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Punjab', 'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Telangana', 'Tripura', 'Uttar Pradesh', 'Uttarakhand', 'West Bengal', 'Andaman and Nicobar Islands', 'Chandigarh', 'Dadra and Nagar Haveli and Daman and Diu', 'Delhi', 'Jammu and Kashmir', 'Ladakh', 'Lakshadweep', 'Puducherry'];
                            @endphp
                            @foreach($states as $state)
                                <option value="{{ $state }}" {{ old('state', $client->state) == $state ? 'selected' : '' }}>
                                    {{ $state }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">PIN Code</label>
                        <input type="text" name="pin" value="{{ old('pin', $client->pin) }}"
                            class="w-full border rounded px-3 py-2" maxlength="6" pattern="\d{6}"
                            placeholder="6-digit PIN" required>
                    </div>
                </div>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded w-full">
                    Update Client
                </button>
            </form>
        </div>
    </div>
</x-app-layout>