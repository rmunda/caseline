<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Manage Clients') }}</h2>
            <a
                href="{{ route('clients.create') }}"
                class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded">
                + New Client
            </a>
        </div>
    </x-slot>

    <!--Datatable starts here-->
    <x-admin-table>
        {{ $dataTable->table() }}
    </x-admin-table>
   
@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
</x-app-layout>
