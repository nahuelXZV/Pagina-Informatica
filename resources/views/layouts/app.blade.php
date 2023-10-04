<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    <title>{{ config('app.name', 'Informatica-FICCT') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="{{ asset('livewire/livewire.js') }}"></script>
    <!-- Styles -->
    {{-- @livewireStyles --}}
</head>

<body class="font-sans antialiased flex flex-col min-h-screen">

    {{-- NAV --}}
    @if ($type == 'nav-back')
        <x-layout.nav />
    @else
        <x-layout.nav-static />
    @endif

    {{-- BACKGROUND --}}
    @if ($type == 'nav-back')
        <x-layout.background :url_imagen="$pagina->imagen_principal" />
    @endif

    {{-- CONTENT --}}
    <div class=" flex-grow ">
        <div class="flex flex-colitems-center justify-center w-full mt-10 px-3 md:px-28">
            {{ $slot }}
        </div>
    </div>

    {{-- FOOTER --}}
    <x-layout.footer :tel="$pagina->telefono" :dir="$pagina->direccion" :correo="$pagina->correo" :face="$pagina->url_facebook" :whatsapp="$pagina->url_whatsapp"
        class="mt-auto" />

    {{-- Scripts --}}
    @stack('modals')

    @livewireScripts
</body>

</html>
