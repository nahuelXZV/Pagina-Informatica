<div class="container py-2">
    <div class="flex flex-col md:block md:justify-between items-center mb-7">
        <h1 class="text-3xl font-bold text-gray-700 mb-2">{{ $noticia->titulo }}</h1>
        <p class="text-gray-600 text-sm">{{ $noticia->fecha }}</p>
    </div>
    <div class="text-gray-600 mb-7">
        @if ($noticia->contenido)
            {!! $noticia->contenido !!}
        @else
            {!! $noticia->descripcion !!}
        @endif
    </div>

    <div class="grid gap-4 mb-10">
        <div>
            <h1 class="text-xl font-bold text-gray-700 mb-2">Galeria de imagenes</h1>
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $noticia->imagen_principal) }}"
                alt="imagen pricipal">
        </div>
        <div class="grid grid-cols-5 gap-4">
            @foreach ($fotos as $file)
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $file->foto) }}"
                        alt="{{ $file->nombre }}">
                </div>
            @endforeach

        </div>
    </div>

</div>
