@extends('master')
@section('title', __('Gestionar Residente'))
@section('content')


    <br><br>
    @isset($residente)
        <div class="row">
            <div class="col-12 text-center">
                <h2>{{ __('MODIFICAR RESIDENTE') }}</h2>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-10 text-center">
                <h2>{{ __('CREAR RESIDENTE') }}</h2>
            </div>
        </div>
    @endisset
    <!-- Solo puede modifica la habitación y el estado-->
    <div class="row justify-content-center">
        <div class="col-md-6">
            @isset($residente)
                <form action="{{ route('actualizar.residente', ['id' => $residente->id]) }}" method="POST">
                    @method('put')
                @else
                    <form action="{{ route('almacenar.residente') }}" method="POST">
                    @endisset
                    @csrf
                    <div class="mb-3">
                        <label for="dni" class="form-label">{{ __('DNI:') }}</label>
                        <input type="text" class="form-control" id="dni" name="dni"
                            value="{{ $residente->dni ?? '' }}" @isset($residente) readonly @endisset
                            pattern="[0-9]{8}[A-Za-z]" placeholder="012345678A" maxlength="9">
                        <x-input-error :messages="$errors->get('dni')" class="mt-2" /> <!--Componente personalizado de laravel que devuelve los errores de validación del controller para mostralos -->

                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">{{ __('Nombre:') }}</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ old('nombre', $residente->nombre ?? '' )}}" @isset($residente) readonly @endisset> <!-- old('') devuelve el valor enviado al formulario para no reescribirlo en caso de vuelta al formulario por error de validación -->
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">{{ __('Apellidos:') }}</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos"
                            value="{{ old('apellidos', $residente->apellidos ?? '' )}}"
                            @isset($residente) readonly @endisset>
                    </div>
                    <div class="mb-3">
                        <label for="habitacion" class="form-label">{{ __('Habitación:') }}</label>
                        <input type="number" class="form-control" id="habitacion" name="habitacion"
                            value="{{ old('habitacion', $residente->habitacion ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">{{ __('Estado:') }}</label>
                        <select class="form-select" id="estado" name="estado">
                            <option value="alta">{{ __('Alta') }}</option>
                            @isset($residente)
                                <option value="baja" @if ($residente->estado == 'baja') selected @endif>
                                    {{ __('Baja') }}</option>
                            @endisset
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nac" class="form-label">{{ __('Fecha de nacimiento:') }}</label>
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac"
                            value="{{ old('fecha_nac', $residente->fecha_nac ?? '' )}}"
                            @isset($residente) readonly @endisset>
                        <x-input-error :messages="$errors->get('fecha_nac')" class="mt-2" />

                    </div><br>


                    @isset($residente)
                        <!--Si está establecida la tarea mostrar modificar, si no crear-->
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('{{ __('¿Estás seguro de que deseas modificar este residente?') }}')">{{ __('MODIFICAR') }}</button>
                        <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia, por lo que no se borra-->
                    @else
                        <button type="submit" class="btn btn-success">{{ __('CREAR') }}</button>
                    @endisset
                </form>
        </div>
    </div>


@endsection
