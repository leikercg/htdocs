@extends('master')
@section('title', 'Crear Usuario')
@section('content')
    @isset($familiar)<!-- SI ESTA ESTABLECIDO EL FAMILIAR MOSTRAR EL FORMULUARIO DE EDICIÓN, SI NO MOSTRAR EL DE CREACIÓN-->
        <!-- Solo se puede modificar el telefono y dirección-->

        <br><br>
        <div class="row">
            <div class="col text-center">
                <h2>Modificar Familiar </h2>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('actualizar.familiar', ['id' => $familiar->id]) }}" method="POST">
                    @method('put')
                    @csrf
                    <!-- ID -->
                    <div class="mt-4">
                        <label for="id">ID</label>
                        <input class="form-control" id="id" class="block mt-1 w-full form-control" type="text"
                            name="id" readonly value="{{ $familiar->id }}" required />
                    </div>

                    <!-- Nombre -->
                    <div class="mt-4">
                        <label for="name">Nombre</label>
                        <input id="name" class="block mt-1 w-full form-control" type="text" name="nombre" readonly
                            value="{{ $familiar->nombre }}" required />
                    </div>

                    <!-- DNI -->
                    <div class="mt-4">
                        <label for="dni">DNI</label>
                        <input id="dni" class="block mt-1 w-full form-control" type="text" name="dni"
                            value="{{ $familiar->dni }}" required readonly>
                    </div>

                    <!-- Apellidos -->
                    <div class="mt-4">
                        <label for="apellidos">Apellidos</label>
                        <input id="apellidos" class="block mt-1 w-full form-control" type="text" name="apellidos"
                            value="{{ $familiar->apellidos }}" required readonly />
                    </div>
                    <!--Familiar-->
                    <div class="mt-4">
                        @foreach ($familiar->residentes as $residente)
                            <label>Residentes</label>
                            <input id="apellidos" class="block mt-1 w-full form-control" type="text"
                                value="{{ $residente->nombre }} {{ $residente->apellidos }}" required readonly /> <br>
                            <!--No tiene name por que no se envia-->
                        @endforeach
                    </div>

                    <!--Agregar otro Familiar-->
                    <div class="mt-0">
                        <label>Nuevo residente</label>
                        <select name="residente" id="" class="form-select">
                            @foreach ($residentes as $residente)
                                <option value="{{ $residente->id }}">
                                    {{ $residente->nombre }} {{ $residente->apellidos }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Dirección -->
                    <div class="mt-4">
                        <label for="direccion">Dirección</label>
                        <input id="direccion" class="block mt-1 w-full form-control" type="text" name="direccion"
                            value="{{ $familiar->direccion }}" required autofocus />
                    </div>

                    <!-- Teléfono -->
                    <div class="mt-4">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" class="block mt-1 w-full form-control" type="text" name="telefono"
                            value="{{ $familiar->telefono }}" required />
                    </div>

                    <!-- Departamento -->
                    <div class="mt-4">
                        <label for="departamento">Departamento</label>
                        <input type="text" name="departamento" id="departamento"
                            value="{{ $familiar->departamento->nombre }}" class="form-control" readonly>
                    </div>

                    <!-- Password Solo podrá cambiarla el usuario -->

                    <div class="flex items-center justify-center mt-4">
                        <input type="submit" value="Actualizar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-2 text-center">
                <form action="{{ route('borrar.familiar', $familiar->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este familiar?')">BORRAR</button> <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia-->
                </form>
            </div>
        </div>
    @else
        <br><br>
        <div class="row">
            <div class="col-12 text-center">
                <h2>Crear Familiar</h2>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Este es el formulario por defecto de register de Breeze, hemos añadido los campos necesarios para los usuario y extendido la plantilla master -->


                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input id="name" class="block mt-1 w-full form-control" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
                            :value="old('dni')" required autocomplete="dni" />
                        <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                    </div>

                    <!-- Apellidos -->
                    <div class="mt-4">
                        <x-input-label for="apellidos" :value="__('Apellidos')" />
                        <x-text-input id="apellidos" class="block mt-1 w-full form-control" type="text" name="apellidos"
                            :value="old('apellidos')" required autocomplete="apellidos" />
                        <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                    </div>

                    <!--Familiar-->
                    <div class="mt-4">
                        <label for="residente">Residentes</label>
                        <select name="residente" id="residente" class="form-select">
                            @foreach ($residentes as $residente)
                                <option value="{{ $residente->id }}">
                                    {{ $residente->nombre }} {{ $residente->apellidos }}
                                </option>
                            @endforeach
                        </select>
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
                            :value="old('telefono')" required autocomplete="telefono" />
                        <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                    </div>

                    <!-- Departamento -->
                    <div class="mt-4">
                        <x-input-label for="departamento" :value="__('Departamento')" />
                        <select name="departamento" id="departamento" class="form-control">
                            <option value="6">Familiar</option>
                        </select>
                        <x-input-error :messages="$errors->get('departamento')" class="mt-2" />
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

                    <div class="flex items-center justify-center mt-4">
                        <input type="submit" value="enviar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>


    @endisset


@endsection
