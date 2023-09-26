<div class="">
    <nav class="flex py-3 mb-5">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <x-iconos.home />
                    Home
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <x-iconos.flecha />
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Roles</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="p-4 bg-white flex flex-center justify-between ">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <x-iconos.search />
                </div>
                <input type="text" id="table-search"
                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                    placeholder="Search for items" wire:model.lazy='search'>
            </div>
            <a href="{{ route('rol.new') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2">
                <x-iconos.plus />
                Nuevo
            </a>
        </div>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercasebg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $rol)
                    <tr class="bg-white border-b  hover:bg-gray-50 ">
                        <td class="px-6 py-4">
                            {{ $rol->name }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a type="button" href="{{ route('rol.edit', $rol->id) }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center ">
                                <x-iconos.edit />
                            </a>
                            @can('eliminar')
                                <button type="button" wire:click="delete({{ $rol->id }})"
                                    onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()"
                                    class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center ">
                                    <x-iconos.delete />
                                </button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <x-shared.pagination :modelo='$roles' />
    </div>

    @if ($notificacion)
        <x-shared.notificacion :message="$message" :type="$type" />
    @endif
    <script>
        Livewire.on('notificacion', function() {
            let interval = 5000;
            setTimeout((function() {
                @this.notificacion = false;
            }), interval);
        });
    </script>
</div>
