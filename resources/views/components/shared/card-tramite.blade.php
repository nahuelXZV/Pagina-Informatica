@props(['url' => 'https://picsum.photos/600/400/?random', 'date' => '25 de diciembre 2023', 'title' => '', 'content' => '', 'downloadCarta'])

<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row">
    <img class="object-cover w-full px-2 rounded-t-lg h-96 md:h-auto md:w-52 md:rounded-none md:rounded-l-lg"
        src="{{ $url }}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
            {{ $title }}
        </h5>
        <p class="mb-1 text-sm font-normal text-gray-500 ">
            {{ $date }}
        </p>
        <p class="font-normal text-gray-500 mb-2 ">
            {{ $content }}
        </p>
        @if ($downloadCarta)
            <a type="button" href="{{ $downloadCarta }}" target="_blank"
                class="w-28 px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 ">
                <x-icons.download />
                Descargar
            </a>
        @endif
    </div>
</div>
