<section>
    <!--   <header>
       MODIFICAMOS ESTA SECTION
    </header>-->

    <div class="row">
        <div class="col text-center">
            <h2> {{ __('Profile Information') }}</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div>
                    <!--<x-input-label for="name" :value="__('Name')" />   PARA NO MOSTRAR EL NOMBRE DE USUARIO    -->
                    <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)"
                        required autofocus autocomplete="name" hidden />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                @isset($user->familiar)
                    {{-- Si es un familiar mostrar esto --}}
                    <!-- Dirección -->
                    <div class="mt-4">
                        <x-input-label for="direccion" :value="__('Dirección')" />
                        <x-text-input id="direccion" class="form-control" type="text" name="direccion" :value="old('direccion', $user->familiar->direccion)"
                            required autocomplete="direccion" />
                        <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                    </div>

                    <!-- Teléfono -->
                    <div class="mt-4">
                        <x-input-label for="telefono" :value="__('Teléfono')" />
                        <x-text-input id="telefono" class="form-control" type="text" name="telefono" :value="old('direccion', $user->familiar->telefono)"
                            required autocomplete="telefono" pattern="[0-9]{9}" placeholder="623456789" maxlength="9" />
                        <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                    </div>
                @else
                    {{-- Si es un empleado mostrar esto --}}

                    @if ($user->departamento_id == 7)
                        {{-- no mostrar nada si es admin ya que el admin no tiene dirección--}}
                    @else
                    {{--Si es empleado normal mostrar esto--}}
                        <!-- Dirección -->
                        <div class="mt-4">
                            <x-input-label for="direccion" :value="__('Dirección')" />
                            <x-text-input id="direccion" class="form-control" type="text" name="direccion"
                                :value="old('direccion', $user->empleado->direccion)" required autocomplete="direccion" />
                            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                        </div>

                        <!-- Teléfono -->
                        <div class="mt-4">
                            <x-input-label for="telefono" :value="__('Teléfono')" />
                            <x-text-input id="telefono" class="form-control" type="text" name="telefono"
                                :value="old('direccion', $user->empleado->telefono)" required autocomplete="telefono" pattern="[0-9]{9}"
                                placeholder="623456789" maxlength="9" />
                            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                        </div>
                    @endif
                @endisset


                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)"
                        required autocomplete="username" readonly />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                  {{--  @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && $user->hasVerifiedEmail()) MENSAJE DE CONFIRMAR CORREO
                        <div>
                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>
                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif--}}
                </div>
                <br>
                <div class="flex items-center gap-4">
                    <button class="btn btn-primary">{{ __('Save') }}</button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                        <!--Si ya está actualizado mostrar este mensaje-->
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
