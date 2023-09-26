<div class="">
    <div class="flex flex-col items-center justify-center h-full mt-16 z-10">
        <div class="flex flex-col items-center justify-center">
            <img src="{{ asset('img/logo.jpg') }}" alt="" class="w-60 h-auto mb-10 rounded-full">
            <h1 class="text-3xl mb-2 uppercase font-bold text-gray-700">Bienvenido, {{ auth()->user()->name }}</h1>
            <p class="text-gray-500">Seleccione una opción del menú lateral</p>
        </div>
    </div>
</div>
