<x-app-layout>
    {{-- NOTICIAS --}}
    <div class="relative w-full px-4 py-4 mx-auto  bg-white rounded-lg shadow ">

        <div class="flex items-center justify-between mb-4">
            <p class="text-2xl font-bold text-gray-800 uppercase">
                Noticias
            </p>
            <a class="text-sm text-gray-700 hover:underline" href="{{ route('noticias') }}">
                Ver todas
            </a>
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($noticias as $noticia)
                <x-shared.card-noticias :url="$noticia->url" :date="$noticia->fecha" :title="$noticia->titulo" :content="$noticia->descripcion" />
            @endforeach

        </div>

    </div>

    {{-- CALENDARIO ACADEMICO  --}}
    <div class="relative w-full px-4 py-4 mx-auto  bg-white rounded-lg shadow ">
        <div class="max-w-screen-xl py-4 mx-auto">
            <div class="flex items-center justify-between mb-4">
                <p class="text-2xl font-bold text-gray-800 uppercase">
                    Calendario Academico
                </p>
            </div>
            <div class="flex bg-white border border-gray-200 rounded-lg shadow justify-center ">
                <img class="rounded-t-lg"
                    src="{{$pagina->url_calendario_academico}}"
                    alt="" />
            </div>
        </div>
    </div>

    {{-- PLAN DE ESTUDIO  --}}
    <div class="relative w-full px-4 py-4 mx-auto  bg-white rounded-lg shadow ">
        <div class="max-w-screen-xl py-4 mx-auto">
            <div class="flex items-center justify-between mb-4">
                <p class="text-2xl font-bold text-gray-800 uppercase">
                    Plan de Estudio
                </p>
            </div>
            <div class="flex bg-white border border-gray-200 rounded-lg shadow justify-center">
                <img class="rounded-t-lg" src="{{ $pagina->url_plan_estudio }}" alt="" />
            </div>
        </div>
    </div>

    {{-- TRAMITES --}}
    <div class="relative w-full px-4 py-4 mx-auto  bg-white rounded-lg shadow ">

        <div class="flex items-center justify-between mb-4">
            <p class="text-2xl font-bold text-gray-800 uppercase">
                Tramites
            </p>
            <a class="text-sm text-gray-700 hover:underline" href="{{ route('tramites') }}">
                Ver todas
            </a>
        </div>
        <div class="flex flex-wrap -mx-4">
            @foreach ($tramites as $tramite)
                <div class="w-full px-4 mb-4 lg:w-1/2">
                    <x-shared.card-tramite :url="$tramite->url_imagen" :date="$tramite->fecha" :title="$tramite->titulo" :content="$tramite->descripcion"
                        :downloadCarta="$tramite->url_carta" />
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
