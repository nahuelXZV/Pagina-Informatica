<div>
    <nav class="flex justify-between py-3 mb-5">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
                    <x-iconos.home />
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <x-iconos.flecha />
                    <a href="{{ route('rol.list') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 ">Roles</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <x-iconos.flecha />
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 ">Nuevo</span>
                </div>
            </li>
        </ol>
        <div>
            <button wire:click="save"
                class="inline-flex items-center justify-center h-9 px-4 ml-5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50">
                Guardar
            </button>
        </div>
    </nav>

    <form class="grid grid-cols-2 gap-3">
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 ">Nombre*</label>
            <input type="text" wire:model.defer="name""
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="Escriba el nombre" required>
            <x-input-error for="name" />
        </div>

        <div class="mb-6 col-span-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 ">Permisos*</label>
            <div class="grid grid-cols-4">
                @foreach ($permisos as $key => $permiso)
                    <div class="flex items-center mb-4">
                        <input id="{{ $permiso->name }}" type="checkbox" value="{{ $permiso->id }}"
                            wire:model.live='permisosSeleccionados'
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                        <label for="{{ $permiso->name }}"
                            class="ml-2 text-sm font-medium text-gray-900 ">{{ $permiso->description }}</label>
                    </div>
                @endforeach
                <x-input-error for="permisosSeleccionados" />
            </div>

        </div>
    </form>
</div>
