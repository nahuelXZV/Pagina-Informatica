<div class="flex flex-wrap -mx-4">
    <div class="px-4 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
        @foreach ($noticias as $noticia)
            <x-shared.card-noticias :url="$noticia->imagen_principal" :date="$noticia->fecha" :title="$noticia->titulo" :content="$noticia->descripcion"
                :slug="$noticia->slug" />
        @endforeach
    </div>
    <br>
    <div class="w-full">
        <x-shared.pagination :modelo='$noticias' />
    </div>
</div>
