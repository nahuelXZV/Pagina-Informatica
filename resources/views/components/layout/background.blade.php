@props(['url_imagen' => 'https://ei-uagrm.edu.bo/wp-content/uploads/2023/05/eiuagrm-4.webp'])

<div class="relative">
    <img src="{{ asset('storage/' . $url_imagen) }}" alt="Imagen de fondo" class="w-screen h-max md:h-screen">
    <div class="absolute inset-24 flex justify-center items-center">
        <div class="text-center text-white">
            <p class="text:3xl mt-7 md:mt-0 md:text-6xl font-bold uppercase">Ingenieria Informática</p>
            <hr class="my-2 border-gray-200 border-2  lg:my-2" />
            <p class="text-sm md:text-2xl font-semibold">Facultad de ingenieria en ciencias de la computación y
                telecomunicaciones.</p>
        </div>
    </div>
</div>
