@use(App\Enums\Gender)
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('New Client') }}</h2>
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

            <form action="{{ route('clients.store') }}" method="POST" class="bg-white p-6 rounded shadow">
                @csrf

                <!-- Name Row -->
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                            class="w-full border rounded px-3 py-2" maxlength="50" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Middle Name</label>
                        <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                            class="w-full border rounded px-3 py-2" maxlength="50">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                            class="w-full border rounded px-3 py-2" maxlength="50" required>
                    </div>
                </div>

                <!-- Gender & DOB Row -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Gender</label>
                        <select name="gender" class="w-full border rounded px-3 py-2" required>
                            <option value="">— Select Gender —</option>
                            @foreach (Gender::cases() as $gender)
                                <option value="{{ $gender->value }}" {{ old('gender') == $gender->value ? 'selected' : '' }}>
                                    {{ $gender->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Date of Birth</label>
                        <input type="date" name="dob" value="{{ old('dob') }}"
                            class="w-full border rounded px-3 py-2" required>
                    </div>
                </div>

                <!-- Address Lines -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Address Line 1</label>
                    <input type="text" name="address_line_1" value="{{ old('address_line_1') }}"
                        class="w-full border rounded px-3 py-2" maxlength="100" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Address Line 2</label>
                    <input type="text" name="address_line_2" value="{{ old('address_line_2') }}"
                        class="w-full border rounded px-3 py-2" maxlength="100">
                </div>

                <!-- City, District, State, PIN Row -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium mb-1">City / Town</label>
                        <input type="text" name="city_town" value="{{ old('city_town') }}"
                            class="w-full border rounded px-3 py-2" maxlength="50" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">District</label>
                        <input type="text" name="district" value="{{ old('district') }}"
                            class="w-full border rounded px-3 py-2" maxlength="50" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">State</label>
                        <select name="state" class="w-full border rounded px-3 py-2" required>
                            <option value="">— Select State —</option>
                            <option value="Andhra Pradesh" {{ old('state') == 'Andhra Pradesh' ? 'selected' : '' }}>Andhra Pradesh</option>
                            <option value="Arunachal Pradesh" {{ old('state') == 'Arunachal Pradesh' ? 'selected' : '' }}>Arunachal Pradesh</option>
                            <option value="Assam" {{ old('state') == 'Assam' ? 'selected' : '' }}>Assam</option>
                            <option value="Bihar" {{ old('state') == 'Bihar' ? 'selected' : '' }}>Bihar</option>
                            <option value="Chhattisgarh" {{ old('state') == 'Chhattisgarh' ? 'selected' : '' }}>Chhattisgarh</option>
                            <option value="Goa" {{ old('state') == 'Goa' ? 'selected' : '' }}>Goa</option>
                            <option value="Gujarat" {{ old('state') == 'Gujarat' ? 'selected' : '' }}>Gujarat</option>
                            <option value="Haryana" {{ old('state') == 'Haryana' ? 'selected' : '' }}>Haryana</option>
                            <option value="Himachal Pradesh" {{ old('state') == 'Himachal Pradesh' ? 'selected' : '' }}>Himachal Pradesh</option>
                            <option value="Jharkhand" {{ old('state') == 'Jharkhand' ? 'selected' : '' }}>Jharkhand</option>
                            <option value="Karnataka" {{ old('state') == 'Karnataka' ? 'selected' : '' }}>Karnataka</option>
                            <option value="Kerala" {{ old('state') == 'Kerala' ? 'selected' : '' }}>Kerala</option>
                            <option value="Madhya Pradesh" {{ old('state') == 'Madhya Pradesh' ? 'selected' : '' }}>Madhya Pradesh</option>
                            <option value="Maharashtra" {{ old('state') == 'Maharashtra' ? 'selected' : '' }}>Maharashtra</option>
                            <option value="Manipur" {{ old('state') == 'Manipur' ? 'selected' : '' }}>Manipur</option>
                            <option value="Meghalaya" {{ old('state') == 'Meghalaya' ? 'selected' : '' }}>Meghalaya</option>
                            <option value="Mizoram" {{ old('state') == 'Mizoram' ? 'selected' : '' }}>Mizoram</option>
                            <option value="Nagaland" {{ old('state') == 'Nagaland' ? 'selected' : '' }}>Nagaland</option>
                            <option value="Odisha" {{ old('state') == 'Odisha' ? 'selected' : '' }}>Odisha</option>
                            <option value="Punjab" {{ old('state') == 'Punjab' ? 'selected' : '' }}>Punjab</option>
                            <option value="Rajasthan" {{ old('state') == 'Rajasthan' ? 'selected' : '' }}>Rajasthan</option>
                            <option value="Sikkim" {{ old('state') == 'Sikkim' ? 'selected' : '' }}>Sikkim</option>
                            <option value="Tamil Nadu" {{ old('state') == 'Tamil Nadu' ? 'selected' : '' }}>Tamil Nadu</option>
                            <option value="Telangana" {{ old('state') == 'Telangana' ? 'selected' : '' }}>Telangana</option>
                            <option value="Tripura" {{ old('state') == 'Tripura' ? 'selected' : '' }}>Tripura</option>
                            <option value="Uttar Pradesh" {{ old('state') == 'Uttar Pradesh' ? 'selected' : '' }}>Uttar Pradesh</option>
                            <option value="Uttarakhand" {{ old('state') == 'Uttarakhand' ? 'selected' : '' }}>Uttarakhand</option>
                            <option value="West Bengal" {{ old('state') == 'West Bengal' ? 'selected' : '' }}>West Bengal</option>
                            <!-- Union Territories -->
                            <option value="Andaman and Nicobar Islands" {{ old('state') == 'Andaman and Nicobar Islands' ? 'selected' : '' }}>Andaman and Nicobar Islands</option>
                            <option value="Chandigarh" {{ old('state') == 'Chandigarh' ? 'selected' : '' }}>Chandigarh</option>
                            <option value="Dadra and Nagar Haveli and Daman and Diu" {{ old('state') == 'Dadra and Nagar Haveli and Daman and Diu' ? 'selected' : '' }}>Dadra and Nagar Haveli and Daman and Diu</option>
                            <option value="Delhi" {{ old('state') == 'Delhi' ? 'selected' : '' }}>Delhi</option>
                            <option value="Jammu and Kashmir" {{ old('state') == 'Jammu and Kashmir' ? 'selected' : '' }}>Jammu and Kashmir</option>
                            <option value="Ladakh" {{ old('state') == 'Ladakh' ? 'selected' : '' }}>Ladakh</option>
                            <option value="Lakshadweep" {{ old('state') == 'Lakshadweep' ? 'selected' : '' }}>Lakshadweep</option>
                            <option value="Puducherry" {{ old('state') == 'Puducherry' ? 'selected' : '' }}>Puducherry</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">PIN Code</label>
                        <input type="text" name="pin" value="{{ old('pin') }}"
                            class="w-full border rounded px-3 py-2" maxlength="6" pattern="\d{6}"
                            placeholder="6-digit PIN" required>
                    </div>
                </div>

                <button type="submit"
                    class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded w-full">
                    Create Client
                </button>
            </form>
        </div>
    </div>
</x-app-layout>