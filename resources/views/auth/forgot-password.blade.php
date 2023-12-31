<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('¿Ha olvidado su contraseña? No se preocupe. Indíquenos su dirección de correo electrónico y le enviaremos
        un enlace para restablecer la contraseña que le permitirá elegir una nueva.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo Electronico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between my-5">
            <x-link :href="route('login')">
                {{__('Iniciar Sesión')}}
            </x-link>

            <x-link :href="route('register')">
                {{__('Crear Cuenta')}}
            </x-link>
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Enlace de restablecimiento de contraseña') }}
        </x-primary-button>
    </form>
</x-guest-layout>