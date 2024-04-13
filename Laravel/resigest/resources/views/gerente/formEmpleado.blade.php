@extends('master')
@section('title', 'Crear Usuario')
@section('content')
    <div id="main" class="container py-4">
        @isset($empleado)<!-- SI ESTA ESTABLECIDO EL EMPLEADO MOSTRAR EL FORMULUARIO DE EDICIÓN, SI NO MOSTRAR EL DE CREACIÓN-->
        <!-- Solo se puede modificar el telefono y dirección-->

        <br><br>
        <div class="row">
            <div class="col-12 text-center">
                <h2>Modificar Empleado </h2>
            </div>
        </div>
        <br>
            <form action="{{ route('actualizar.empleado', ['id' => $empleado->id]) }}" method="POST">
                @method('put')
                @csrf
                <!-- ID -->

                <div>
                    <label for="id">Id</label>
                    <input id="id" class="block mt-1 w-full" type="text" name="id" readonly
                        value="{{ $empleado->id }}" required  />
                </div>
                <br>

                <!-- Nombre -->
                <div>
                    <label for="name">Nombre</label>
                    <input id="name" class="block mt-1 w-full" type="text" name="nombre" readonly
                        value="{{ $empleado->nombre }}" required  />
                </div>

                <!-- DNI -->
                <div class="mt-4">
                    <label for="dni">DNI</label>
                    <input id="dni" class="block mt-1 w-full" type="text" name="dni" value="{{ $empleado->dni }}"
                        required readonly>
                </div>

                <!-- Apellidos -->
                <div class="mt-4">
                    <label for="apellidos">Apellidos</label>
                    <input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos"
                        value="{{ $empleado->apellidos }}" required readonly/>
                </div>

                <!-- Dirección -->
                <div class="mt-4">
                    <label for="direccion">Dirección</label>
                    <input id="direccion" class="block mt-1 w-full" type="text" name="direccion"
                        value="{{ $empleado->direccion }}" required autofocus/>
                </div>

                <!-- Teléfono -->
                <div class="mt-4">
                    <label for="telefono">Teléfono</label>
                    <input id="telefono" class="block mt-1 w-full" type="text" name="telefono"
                        value="{{ $empleado->telefono }}" required/>
                </div>

                <!-- Departamento -->
                <div class="mt-4">
                    <label for="departamento">Departamento</label>
                    <input type="text" name="departamento" id="departamento" value="{{ $empleado->departamento->nombre }}" readonly>
                </div>
                <br><br>

                <!-- Password Solo podrá cambiarla el usuario -->

                <input type="submit" value="Actualizar">
            </form>
        @else
        <br><br>
        <div class="row">
            <div class="col-12 text-center">
                <h2>Crear Empleado</h2>
            </div>
        </div>
        <br>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Este es el formulario por defecto de register de Breeze, hemos añadido los campos necesarios para los usuario y extendido la plantilla master -->

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- DNI -->
                <div class="mt-4">
                    <x-input-label for="dni" :value="__('DNI')" />
                    <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')"
                        required autocomplete="dni" />
                    <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                </div>

                <!-- Apellidos -->
                <div class="mt-4">
                    <x-input-label for="apellidos" :value="__('Apellidos')" />
                    <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')"
                        required autocomplete="apellidos" />
                    <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                </div>

                <!-- Dirección -->
                <div class="mt-4">
                    <x-input-label for="direccion" :value="__('Dirección')" />
                    <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')"
                        required autocomplete="direccion" />
                    <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                </div>

                <!-- Teléfono -->
                <div class="mt-4">
                    <x-input-label for="telefono" :value="__('Teléfono')" />
                    <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')"
                        required autocomplete="telefono" />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div>

                <!-- Departamento -->
                <div class="mt-4">
                    <x-input-label for="departamento" :value="__('Departamento')" />
                    <select name="departamento" id="">
                        <option value="1">Medicina</option>
                        <option value="2">Enfermería</option>
                        <option value="3">Fisioterapía</option>
                        <option value="4">Terapia</option>
                        <option value="5">Asistencial</option>
                    </select>
                    <x-input-error :messages="$errors->get('departamento')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <input type="submit" value="enviar">
                </div>
            </form>

        @endisset


    </div>
@endsection
