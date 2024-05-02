@extends('master')
@section('title', __('Itinerario'))
@section('content')
    <div class="row">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('lista.residentes') }}">{{ __('Lista de residentes') }}</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h2>{{ __('Itinerario de') }} {{ $empleado->nombre }} {{ $empleado->apellidos }}</h2>
        </div>
    </div>
    <br>
    <div class="row">
        <form method="GET" action="{{ route('itinerario.empleado') }}">
            <label for="fecha" class="form-label">{{ __('Selecciona una fecha') }}:</label>
            <input type="date" id="fecha" name="fecha">
            <button type="submit">{{ __('Buscar') }}</button>
        </form>
    </div>
    <br><br>
    <p>{{ __('Itinerario de') }} {{ date('d/m/Y', strtotime($fecha)) }}:</p>
    <div class="row justify-content-center">
        <div class="col-10 col-md-8">
            <ol class="list-group list-group-numbered">
                @foreach ($programacion as $actividad)
                    @if ($actividad->fecha == $fecha)
                        @if ($actividad->empleado->departamento->id == 1)
                            <li class="list-group-item">{{ __('Visita médica') }} <br>
                                {{ date('d/m/Y', strtotime($actividad->fecha)) }}
                                <b>{{ $actividad->hora }} <br>
                                    {{ __('Residente') }}: {{ $actividad->residente->nombre }}
                                    {{ $actividad->residente->apellidos }}</b>
                            </li>
                        @elseif($actividad->empleado->departamento->id == 3)
                            <li class="list-group-item">{{ __('Sesión de fisioterapia') }} <br>
                                {{ date('d/m/Y', strtotime($actividad->fecha)) }} <b>{{ $actividad->hora }} <br>
                                    {{ __('Residente') }}:
                                    {{ $actividad->residente->nombre }} {{ $actividad->residente->apellidos }}</b></li>
                        @elseif($actividad->empleado->departamento->id == 4)
                            <li class="list-group-item">{{ __('Grupo de terapia') }} <br>
                                {{ date('d/m/Y', strtotime($actividad->fecha)) }} <b>{{ $actividad->hora }} <br>
                                    {{ __('Descripción') }}:
                                </b><br>
                                {{ $actividad->descripcion }}</li>
                        @elseif($actividad->empleado->departamento->id == 2 && $actividad->descripcion != null)
                            <li class="list-group-item">
                                {{ $actividad->descripcion }} <br>
                                {{ date('d/m/Y', strtotime($actividad->fecha)) }} <b>{{ $actividad->hora }}</b></li>
                        @else
                            <li class="list-group-item">{{ __('Realizar cura en') }}
                                {{ $actividad->zona }} {{ __('en estado') }} {{ $actividad->estado }} <br>
                                {{ date('d/m/Y', strtotime($actividad->fecha)) }} <b>{{ $actividad->hora }} <br>
                                    {{ __('Residente') }}:
                                    {{ $actividad->residente->nombre }} {{ $actividad->residente->apellidos }}</b></li>
                        @endif
                    @endif
                @endforeach
            </ol>
        </div>
    </div>
@endsection
