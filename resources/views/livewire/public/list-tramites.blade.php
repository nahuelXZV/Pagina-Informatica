<div class="flex flex-wrap -mx-4">
    @foreach ($tramites as $tramite)
        <div class="w-full px-4 mb-4 lg:w-1/2">
            <x-shared.card-tramite :url="$tramite->imagen_principal" :date="$tramite->fecha" :title="$tramite->titulo" :content="$tramite->descripcion"
                :downloadCarta="$tramite->modelo_carta" />
        </div>
    @endforeach
    <div class="w-full">
        <x-shared.pagination :modelo='$tramites' />
    </div>
</div>
