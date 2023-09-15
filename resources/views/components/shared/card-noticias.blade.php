@props(['url' => 'https://picsum.photos/600/400/?random', 'date' => '25 de diciembre 2023', 'title' => '', 'content' => ''])

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
    <img class="rounded-t-lg w-full h-52" src="{{ $url }}" alt="" />
    <div class="p-5">
        <p class="mb-1 font-normal text-gray-500 ">
            {{ $date }}
        </p>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
            {{ $title }}
        </h5>
        <p class="font-normal text-gray-500 ">
            {{ $content }}
        </p>
    </div>
</div>
