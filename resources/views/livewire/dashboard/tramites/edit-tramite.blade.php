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
                    <a href="{{ route('tramite.list') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 ">Tramites</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <x-iconos.flecha />
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Nuevo</span>
                </div>
            </li>
        </ol>
        <div>
            <button wire:click="save" wire:loading.attr="disabled"
                class="inline-flex items-center justify-center h-9 px-4 ml-5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50">
                Guardar
            </button>
        </div>
    </nav>

    <form name="formulario" class="grid grid-cols-1 md:grid-cols-2">
        <div class="grid grid-cols-1 px-3 bg-white border py-5 rounded-lg mx-1">
            <div class="mb-6">
                <label for="file" class="block mb-2 text-sm font-bold text-gray-900">Previsualizar</label>
                <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        @if ($tramiteArray['imagen'])
                            <img src="{{ $tramiteArray['imagen']->temporaryUrl() }}" alt="imagen"
                                class="w-full h-min">
                        @else
                            <img src="{{ asset('storage/' . $tramiteArray['imagen_principal']) }}" alt="imagen"
                                class="w-full h-min">
                        @endif
                    </div>
                </div>
                <x-input-error for="noticiaArray.imagen" />
            </div>
            <div class="mb-6">
                <label for="file" class="block mb-2 text-sm font-bold text-gray-900">Imagen*</label>
                <input type="file" id="imagen" name="imagen" wire:model.defer="tramiteArray.imagen" required
                    wire:loading.attr="disabled"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            </div>
        </div>

        <div class="flex flex-col px-3 bg-white border py-5 rounded-lg mx-1">
            <div class="mb-6 h-min">
                <label class="block mb-2 text-sm font-bold text-gray-900">Titulo*</label>
                <input type="text" wire:model.defer="tramiteArray.titulo" id="titulo" name="titulo"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Escriba el titulo" required>
                <x-input-error for="tramiteArray.titulo" />
            </div>
            <div class="mb-6 h-min">
                <label class="block mb-2 text-sm font-bold text-gray-900">Modelo Carta</label>
                <input type="file" wire:model.defer="tramiteArray.carta" id="carta" name="carta"
                    wire:loading.attr="disabled"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    required>
                <x-input-error for="tramiteArray.carta" />
            </div>
            <div class="mb-6 h-min">
                <label class="block mb-2 text-sm font-bold text-gray-900">Descripcion*</label>
                <textarea wire:model.defer="tramiteArray.descripcion" id="descripcion" name="descripcion"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Escriba la descripcion" required></textarea>
                <x-input-error for="tramiteArray.descripcion" />
            </div>
        </div>
    </form>
</div>
