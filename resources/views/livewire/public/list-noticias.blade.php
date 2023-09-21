<div class="flex flex-wrap -mx-4">
    @foreach ($noticias as $noticia)
        <div class="w-full px-4 mb-4 lg:w-1/4">
            <x-shared.card-noticias :url="$noticia->imagen_principal" :date="$noticia->fecha" :title="$noticia->titulo" :content="$noticia->descripcion"
                :slug="$noticia->slug" />
        </div>
    @endforeach
    <x-shared.pagination :modelo='$noticias' />
</div>
