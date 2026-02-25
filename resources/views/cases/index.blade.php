<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Manage Cases') }}</h2>
            <a
                href="{{ route('cases.create') }}"
                class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded">
                + New Case
            </a>
        </div>
    </x-slot>
</x-app-layout>
