<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Escudo_FICCT.png/640px-Escudo_FICCT.png"
                alt="" class="w-28 h-32" />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Correo') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordar') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4 bg-[#003068] hover:bg-[#00498A]">
                    {{ __('Ingresar') }}
                </x-button>
            </div>
            <div class="flex items-center justify-center mt-4">
                <p class="text-sm text-gray-600 items-center text-center">
                    Solo personal autorizado puede acceder a este sistema. <br>
                    Cualquier intento de acceso no autorizado será reportado a las autoridades correspondientes.
                </p>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
