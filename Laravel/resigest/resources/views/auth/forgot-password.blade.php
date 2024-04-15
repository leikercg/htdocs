<x-guest-layout>
    <a href="{{route('inicio')}}"><img src="{{ asset('images/logo-FRA.png') }}" alt= "Logo de Fundación Rey Ardid" /></a>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Inserta tu correo electrónico para restaurar tu contraseña') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Enviar e-mail de restauración') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>