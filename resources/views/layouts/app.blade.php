<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                <!-- Flash Messages -->
                    @if(session('error'))
                        <div id="errorAlert" class="bg-red-100 text-red-700 p-3 rounded mb-4 flex justify-between items-center">
                            <span>{{ session('error') }}</span>
                            <button onclick="document.getElementById('errorAlert').remove()" class="text-red-700 font-bold text-lg leading-none">&times;</button>
                        </div>
                    @endif

                    @if (session('success'))
                        <div id="successAlert" class="bg-green-100 text-green-700 p-3 rounded mb-4 flex justify-between items-center">
                            <span>{{ session('success') }}</span>
                            <button onclick="document.getElementById('successAlert').remove()" class="text-green-700 font-bold text-lg leading-none ml-auto">&times;</button>
                        </div>
                    @endif
                {{ $slot }}
            </main>
        </div>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
    </body>
</html>
