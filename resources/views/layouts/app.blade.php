<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mộc Hoa') }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100
             min-h-screen grid grid-rows-[auto,1fr,auto]">

    {{-- Row 1: Header/Nav --}}
    @include('layouts.navigation')

    {{-- Row 2: Nội dung --}}
    <main>
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <div class="py-6">
            {{ $slot }}
        </div>
    </main>

    {{-- Row 3: Footer (luôn ở đáy) --}}
    <footer class="bg-gray-900 text-white text-center py-3">
        © 2025 Mộc Hoa — Hotline 0867.169.891
    </footer>
</body>
</html>
