{{--Vista de formulario de edicion y creación de visitas--}}
@extends('master')
@section('title', __('Crear visita para ') . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
    @isset($visita->id)
        <div class="row">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('lista.residentes') }}">{{ __('Lista de residentes') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ficha.residente', $residente->id) }}">{{ $residente->nombre }}
                            {{ $residente->apellidos }}</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('visitas.residente', ['residente_id' => $residente->id]) }}">{{ __('Visitas') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Modificar visita') }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <h2>{{ __('MODIFICAR VISITA A: ') . $residente->nombre . ' ' . $residente->apellidos }} </h2>
            </div>
        </div>
    @else
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('lista.residentes') }}">{{ __('Lista de residentes') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ficha.residente', $residente->id) }}">{{ $residente->nombre }} {{ $residente->apellidos }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('visitas.residente', ['residente_id' => $residente->id]) }}">{{ __('Visitas') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Crear visita') }}</li>
        </ol>
    </nav>
        <div class="row justify-content-center">
            <div class="col-10 text-center">
                <h2>{{ __('CREAR VISITA A: ') . $residente->nombre . ' ' . $residente->apellidos }} </h2>
            </div>
        </div>
    @endisset
    <!-- Solo puede modificar la hora y la fecha-->
    <!--Si la visita esta creada ya se muestra este formulario de actualización-->
    <div class="row justify-content-center">
        <div class="col-md-6">
            @isset($visita->id)
                <form action="{{ route('actualizar.visita', ['id' => $visita->id]) }}" method="POST">
                    @method('put')
                @else
                    <form action="{{ route('almacenar.visita') }}" method="POST">
                    @endisset
                    @csrf
                    @isset($visita)
                        <div class="mb-3">
                            <label for="id" class="form-label">{{ __('ID') }}:</label>
                            <input type="text" class="form-control" id="id" name="id"
                                value="{{ $visita->id ?? '' }}" @isset($visita) readonly @endisset>
                        </div>
                    @endisset

                    <div class="mb-3">
                        <label for="medico" class="form-label">{{ __('Médico') }}:</label>
                        <input type="text" class="form-control" id="medico" name="nombre"
                            value="{{ auth()->user()->empleado->nombre }} {{ auth()->user()->empleado->apellidos }} "
                            disabled>
                        <input type="text" name="empleado_id" id="" hidden
                            value="{{ auth()->user()->empleado->id }}">
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">{{ __('Fecha') }}:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required
                            value="{{ old('fecha', $visita->fecha ?? '') }}">
                        <x-input-error :messages="$errors->get('fecha')" class="mt-2" />

                    </div>
                    <div class="mb-3">
                        <label for="hora" class="form-label">{{ __('Hora') }}:</label>
                        <input type="time" class="form-control" id="hora" name="hora" required
                            value="{{ old('hora', $visita->hora ?? '') }}">
                    </div>
                    <br>
                    <input type="text" hidden name="residente_id" value="{{ $residente->id }}">


                    @isset($visita)
                        <!--Si está establecida la visita mostrar modificar, si no crear-->
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('{{ __('¿Estás seguro de que deseas modificar esta visita?') }}')">{{ __('MODIFICAR') }}</button>
                        <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia, por lo que no se borra-->
                    @else
                        <button type="submit" class="btn btn-success">{{ __('CREAR') }}</button>
                    @endisset
                </form>
        </div>
    </div>

    @isset($visita->id)
        <div class="row justify-content-center">
            <div class="col-2 text-center">
                <form action="{{ route('borrar.visita', $visita->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('{{ __('¿Estás seguro de que deseas eliminar esta visita?') }}')">{{ __('BORRAR') }}</button>
                    <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia-->
                </form>
            </div>
        </div>
    @endisset

@endsection
