{{--Vista del formulario de edición y modificacion de una sesión--}}
@extends('master')
@section('title', __('Crear sesión para') . ' ' . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
    @isset($sesion->id)
        <div class="row">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('lista.residentes') }}">{{ __('Lista de residentes') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ficha.residente', $residente->id) }}">{{ $residente->nombre }}
                            {{ $residente->apellidos }}</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('sesiones.residente', ['residente_id' => $residente->id]) }}">{{ __('Sesiones') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Modificar sesión') }}</li>
                </ol>
            </nav>
            <div class="col-12 text-center">
                <h2>{{ __('MODIFICAR SESIÓN A') }}: {{ $residente->nombre . ' ' . $residente->apellidos }} </h2>
            </div>
        </div>
    @else
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('lista.residentes') }}">{{ __('Lista de residentes') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ficha.residente', $residente->id) }}">{{ $residente->nombre }}
                    {{ $residente->apellidos }}</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ route('sesiones.residente', ['residente_id' => $residente->id]) }}">{{ __('Sesiones') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Crear sesión') }}</li>
        </ol>
    </nav>
        <div class="row justify-content-center">
            <div class="col-10 text-center">
                <h2>{{ __('CREAR SESIÓN A') }}: {{ $residente->nombre . ' ' . $residente->apellidos }} </h2>
            </div>
        </div>
    @endisset
    <!-- Solo puede modificar la hora y la fecha-->
    <!--Si la sesión esta creada ya se muestra este formulario de actualización-->
    <div class="row justify-content-center">
        <div class="col-md-6 col-10">
            @isset($sesion->id)
                <form action="{{ route('actualizar.sesion', ['id' => $sesion->id]) }}" method="POST">
                    @method('put')
                @else
                    <form action="{{ route('almacenar.sesion') }}" method="POST">
                    @endisset
                    @csrf
                    {{--Id--}}
                    @isset($sesion)
                        <div class="mb-3">
                            <label for="id" class="form-label">{{ __('ID:') }}</label>
                            <input type="text" class="form-control" id="id" name="id"
                                value="{{ $sesion->id ?? '' }}" @isset($sesion) readonly @endisset>
                        </div>
                    @endisset
                    {{--Fisioterapeuta--}}
                    <div class="mb-3">
                        <label for="fisio" class="form-label">{{ __('Fisio') }}</label>
                        <input type="text" class="form-control" id="fisio" name="nombre"
                            value="{{ auth()->user()->empleado->nombre }} {{ auth()->user()->empleado->apellidos }} "
                            disabled>
                        <input type="text" name="empleado_id" id="" hidden
                            value="{{ auth()->user()->empleado->id }}">
                    </div>
                    {{--Fecha--}}
                    <div class="mb-3">
                        <label for="fecha" class="form-label">{{ __('Fecha:') }}</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required
                            value="{{ $sesion->fecha ?? '' }}">
                    </div>
                    {{--Hora--}}
                    <div class="mb-3">
                        <label for="hora" class="form-label">{{ __('Hora:') }}</label>
                        <input type="time" class="form-control" id="hora" name="hora" required
                            value="{{ $sesion->hora ?? '' }}">
                    </div>
                    <br>
                    <input type="text" hidden name="residente_id" value="{{ $residente->id }}">


                    @isset($sesion)
                        <!--Si  establecida la sesión mostrar modificar, si no crear-->
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('{{ __('¿Estás seguro de que deseas modificar esta sesión ?') }}')">{{ __('MODIFICAR') }}</button>
                        <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia, por lo que no se borra-->
                    @else
                        <button type="submit" class="btn btn-success">{{ __('CREAR') }}</button>
                    @endisset
                </form>
        </div>
    </div>

    @isset($sesion->id)
        <div class="row justify-content-center">
            <div class="col-2 text-center">
                <form action="{{ route('borrar.sesion', $sesion->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('{{ __('¿Estás seguro de que deseas eliminar esta sesión?') }}')">{{ __('BORRAR') }}</button>
                    <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia-->
                </form>
            </div>
        </div>
    @endisset

@endsection
