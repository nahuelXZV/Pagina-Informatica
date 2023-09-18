<div class="flex flex-wrap -mx-4">
    @foreach ($tramites as $tramite)
        <div class="w-full px-4 mb-4 lg:w-1/2">
            <x-shared.card-tramite :url="$tramite->url_imagen" :date="$tramite->fecha" :title="$tramite->titulo" :content="$tramite->descripcion"
                :downloadCarta="$tramite->url_carta" />
        </div>
    @endforeach
    <x-shared.pagination :modelo='$tramites' />
</div>
