<x-app-layout :type="'nav'">
    <div class="relative w-full px-4 py-4 mx-auto  bg-white rounded-lg shadow mb-5">
        <div class="flex items-center justify-between mb-4">
            <p class="text-2xl font-bold text-gray-800 uppercase">
                Tramites
            </p>
        </div>
        <livewire:public.list-tramites />
    </div>
</x-app-layout>
