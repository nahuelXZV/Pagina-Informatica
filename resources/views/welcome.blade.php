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
                    Calendario Academico 2021
                </p>
            </div>
            <div class="flex bg-white border border-gray-200 rounded-lg shadow justify-center ">
                <img class="rounded-t-lg"
                    src="https://www.usergioarboleda.edu.co/barranquilla/wp-content/uploads/2015/07/calendario-academico-2021-01-universidad-sergio-arboleda-barranquilla.jpg"
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
                <img class="rounded-t-lg"
                    src="https://udlondres.com/wp-content/uploads/2020/11/DISENO-MAPA-CURRICULAR-C22-714x1024.png"
                    alt="" />
            </div>
        </div>
    </div>
</x-app-layout>
