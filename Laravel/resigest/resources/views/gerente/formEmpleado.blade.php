@extends('master')
@section('title', __('Crear Usuario'))
@section('content')
    @isset($empleado)
        <!-- SI ESTA ESTABLECIDO EL EMPLEADO MOSTRAR EL FORMULUARIO DE EDICIÓN, SI NO MOSTRAR EL DE CREACIÓN-->
        <!-- Solo se puede modificar el telefono y dirección-->

        <br><br>
        <div class="row">
            <div class="col-12 text-center">
                <h2>{{ __('MODIFICAR EMPLEADO') }}</h2>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('actualizar.empleado', ['id' => $empleado->id]) }}" method="POST">
                    @method('put')
                    @csrf
                    <div>
                        <label for="id">{{ __('Id') }}</label>
                        <input id="id" class="block mt-1 w-full form-control" type="text" name="id" readonly
                            value="{{ $empleado->id }}" required>
                    </div>
                    <br>
                    <div>
                        <label for="name">{{ __('Nombre') }}</label>
                        <input id="name" class="block mt-1 w-full form-control" type="text" name="nombre" readonly
                            value="{{ $empleado->nombre }}" required>
                    </div>
                    <div class="mt-4">
                        <label for="dni">{{ __('DNI') }}</label>
                        <input id="dni" class="block mt-1 w-full form-control" type="text" name="dni"
                            value="{{ $empleado->dni }}" pattern="[0-9]{8}[A-Za-z]" placeholder="012345678A" maxlength="9"
                            required readonly>
                    </div>
                    <div class="mt-4">
                        <label for="apellidos">{{ __('Apellidos') }}</label>
                        <input id="apellidos" class="block mt-1 w-full form-control" type="text" name="apellidos"
                            value="{{ $empleado->apellidos }}" required readonly>
                    </div>
                    <div class="mt-4">
                        <label for="direccion">{{ __('Dirección') }}</label>
                        <input id="direccion" class="block mt-1 w-full form-control" type="text" name="direccion"
                            value="{{ $empleado->direccion }}" required autofocus>
                    </div>
                    <div class="mt-4">
                        <label for="telefono">{{ __('Teléfono') }}</label>
                        <input id="telefono" class="block mt-1 w-full form-control" type="text" name="telefono"
                            pattern="[0-9]{9}" placeholder="623456789" maxlength="9" value="{{ $empleado->telefono }}"
                            required>
                    </div>
                    <div class="mt-4">
                        <label for="departamento">{{ __('Departamento') }}</label>
                        <input type="text" name="departamento" id="departamento"
                            value="{{ $empleado->departamento->nombre }}" readonly class="form-control">
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary"
                        onclick="return confirm('{{ __('¿Estás seguro de que deseas modificar esta empleado?') }}')">{{ __('MODIFICAR') }}</button>

                </form>
            </div>
        </div>
    @else
        <br><br>
        <div class="row">
            <div class="col-12 text-center">
                <h2>{{ __('CREAR EMPLEADO') }}</h2>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input id="name" class="block mt-1 w-full form-control" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <!-- Apellidos -->
                    <div class="mt-4">
                        <x-input-label for="apellidos" :value="__('Apellidos')" />
                        <x-text-input id="apellidos" class="block mt-1 w-full form-control" type="text" name="apellidos"
                            :value="old('apellidos')" required autocomplete="apellidos" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- DNI -->
                    <div class="mt-4">
                        <x-input-label for="dni" :value="__('DNI')" />
                        <x-text-input id="dni" class="block mt-1 w-full form-control" type="text" name="dni"
                            :value="old('dni')" required autocomplete="dni" pattern="[0-9]{8}[A-Za-z]" placeholder="012345678A"
                            maxlength="9" />
                        <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                    </div>



                    <!-- Dirección -->
                    <div class="mt-4">
                        <x-input-label for="direccion" :value="__('Dirección')" />
                        <x-text-input id="direccion" class="block mt-1 w-full form-control" type="text" name="direccion"
                            :value="old('direccion')" required autocomplete="direccion" />
                        <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                    </div>

                    <!-- Teléfono -->
                    <div class="mt-4">
                        <x-input-label for="telefono" :value="__('Teléfono')" />
                        <x-text-input id="telefono" class="block mt-1 w-full form-control" type="text" name="telefono"
                            pattern="[0-9]{9}" placeholder="623456789" maxlength="9" :value="old('telefono')" required
                            autocomplete="telefono" />
                        <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                    </div>

                    <!-- Departamento -->
                    <div class="mt-4">
                        <x-input-label for="departamento" :value="__('Departamento')" />
                        <select name="departamento" id="" class="form-select">
                            <option value="1">{{ __('Medicina') }}</option>
                            <option value="2">{{ __('Enfermería') }}</option>
                            <option value="3">{{ __('Fisioterapia') }}</option>
                            <option value="4">{{ __('Terapia') }}</option>
                            <option value="5">{{ __('Asistencial') }}</option>
                        </select>
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full form-control" type="password" name="password"
                            required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full form-control" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-success">{{ __('CREAR') }}</button>
                    </div>
                </form>
            </div>
        </div>

        </div>
        </div>
    @endisset

@endsection
