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
                    <a href="{{ route('pagina.edit') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 ">Pagina</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <x-iconos.flecha />
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Editar</span>
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

    <form name="formulario" class="grid grid-cols-1 ">
        <div class="grid grid-col-1 md:grid-cols-3 px-3 bg-white border py-5 rounded-lg mx-1 mb-4">
            <div class="mb-6 h-min mx-1">
                <label class="block mb-2 text-sm font-bold text-gray-900">Telefono</label>
                <input type="text" wire:model.defer="paginaArray.telefono" id="telefono" name="telefono"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Escriba el telefono" required>
                <x-input-error for="paginaArray.telefono" />
            </div>
            <div class="mb-6 h-min mx-1 col-span-2">
                <label class="block mb-2 text-sm font-bold text-gray-900">Direccion</label>
                <input type="text" wire:model.defer="paginaArray.direccion" id="direccion" name="direccion"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Escriba la direccion" required>
                <x-input-error for="paginaArray.direccion" />
            </div>
            <div class="mb-6 h-min mx-1">
                <label class="block mb-2 text-sm font-bold text-gray-900">Correo</label>
                <input type="text" wire:model.defer="paginaArray.correo" id="correo" name="correo"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Escriba el correo" required>
                <x-input-error for="paginaArray.correo" />
            </div>

            <div class="mb-6 h-min mx-1">
                <label class="block mb-2 text-sm font-bold text-gray-900">Facebook</label>
                <input type="text" wire:model.defer="paginaArray.url_facebook" id="url_facebook" name="url_facebook"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Escriba la url de facebook" required>
                <x-input-error for="paginaArray.url_facebook" />
            </div>
            <div class="mb-6 h-min mx-1">
                <label class="block mb-2 text-sm font-bold text-gray-900">Whatsapp</label>
                <input type="text" wire:model.defer="paginaArray.url_whatsapp" id="url_whatsapp" name="url_whatsapp"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Escriba la url de whatsapp" required>
                <x-input-error for="paginaArray.url_whatsapp" />
            </div>
        </div>

        <div class="grid grid-cols-2 space-y-2">


            <div class="grid grid-cols-1 px-3 bg-white border py-5 rounded-lg mx-1">
                <div class="mb-6">
                    <label for="file" class="block mb-2 text-sm font-bold text-gray-900">Previsualizar Foto
                        Principal</label>
                    <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            @if ($paginaArray['imagen'])
                                <img src="{{ $paginaArray['imagen']->temporaryUrl() }}" alt="imagen"
                                    class="w-full h-min">
                            @else
                                <img src="{{ asset('storage/' . $paginaArray['imagen_principal']) }}" alt="imagen"
                                    class="w-full h-min">
                            @endif
                        </div>
                    </div>
                    <x-input-error for="paginaArray.imagen" />
                </div>
                <div class="mb-6">
                    <label for="file" class="block mb-2 text-sm font-bold text-gray-900">Foto Principal</label>
                    <input type="file" id="imagen" name="imagen" wire:model.defer="paginaArray.imagen" required
                        wire:loading.attr="disabled"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
            </div>

            <div class="grid grid-cols-1 px-3 bg-white border py-5 rounded-lg mx-1">
                <div class="mb-6">
                    <label for="file" class="block mb-2 text-sm font-bold text-gray-900">Previsualizar Calendario
                        Academico</label>
                    <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            @if ($paginaArray['calendario'])
                                <img src="{{ $paginaArray['calendario']->temporaryUrl() }}" alt="imagen"
                                    class="w-full h-min">
                            @else
                                <img src="{{ asset('storage/' . $paginaArray['calendario_academico']) }}" alt="imagen"
                                    class="w-full h-min">
                            @endif
                        </div>
                    </div>
                    <x-input-error for="paginaArray.calendario" />
                </div>
                <div class="mb-6">
                    <label for="file" class="block mb-2 text-sm font-bold text-gray-900">Calendario
                        Academico</label>
                    <input type="file" id="calendario" name="calendario"
                        wire:model.defer="paginaArray.calendario" required wire:loading.attr="disabled"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
            </div>

            <div class="grid grid-cols-1 px-3 bg-white border py-5 rounded-lg mx-1">
                <div class="mb-6">
                    <label for="file" class="block mb-2 text-sm font-bold text-gray-900">Previsualizar Plan de
                        Estudio
                    </label>
                    <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            @if ($paginaArray['plan_estudio_file'])
                                <img src="{{ $paginaArray['plan_estudio_file']->temporaryUrl() }}" alt="imagen"
                                    class="w-full h-min">
                            @else
                                <img src="{{ asset('storage/' . $paginaArray['plan_estudio']) }}" alt="imagen"
                                    class="w-full h-min">
                            @endif
                        </div>
                    </div>
                    <x-input-error for="paginaArray.plan_estudio_file" />
                </div>
                <div class="mb-6">
                    <label for="file" class="block mb-2 text-sm font-bold text-gray-900">Plan de estudio
                    </label>
                    <input type="file" id="plan_estudio_file" name="plan_estudio_file"
                        wire:model.defer="paginaArray.plan_estudio_file" required wire:loading.attr="disabled"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
            </div>
        </div>
    </form>
</div>
