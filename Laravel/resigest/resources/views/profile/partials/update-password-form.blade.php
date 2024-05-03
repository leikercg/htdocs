<section>
    <!-- modificamos la sección para que trenga estilo de nuestro sitio-->
    <div class="row">
        <div class="col text-center"><h2>{{__('Modificar contraseña')}}</h2></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="mb-3">
                    <x-input-label for="contraseña" :value="__('Current Password')" />
                    <x-text-input id="contraseña" name="current_password" type="password" class="form-control"
                        autocomplete="current-password" autofocus />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div><br>

                <div class="mb-3">
                    <x-input-label for="update_password_password" :value="__('New Password')" />
                    <x-text-input id="update_password_password" name="password" type="password" class="form-control"
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div><br>

                <div class="mb-3">
                    <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                        type="password" class="form-control" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div><br>


                <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>

                @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                @endif


            </form>
        </div>
    </div>


</section>
