<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">

    {{-- NAV --}}
    @if ($type == 'nav-back')
        <x-layout.nav />
    @else
        <x-layout.nav-static />
    @endif

    {{-- BACKGROUND --}}
    @if ($type == 'nav-back')
        <x-layout.background />
    @endif

    {{-- CONTENT --}}
    <div class="flex flex-col items-center justify-center w-full mt-10 px-10">
        {{ $slot }}
    </div>

    {{-- FOOTER --}}
    <x-layout.footer />

    {{-- Scripts --}}
    @stack('modals')

    @livewireScripts
</body>

</html>
