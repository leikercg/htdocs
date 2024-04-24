@extends('master')
@section('title', 'Itinerario')
@section('content')
    <br>
    <br>
    <div class="row">
        <div class="col-12 text-center">
            <h2>Itineario de {{ $residente->nombre }} {{ $residente->apellidos }}</h2>
        </div>
    </div>
    <br>
    <div class="row">
        <form method="GET" action="{{ route('itinerario.residente', ['id' => $residente->id]) }}">
            <label for="fecha" class="form-label">Selecciona una fecha:</label>
            <input type="date" id="fecha" name="fecha">
            <button type="submit">Buscar</button>
        </form>
    </div>
    <br><br>
    <p>Itineario de {{ date('d/m/Y', strtotime($fecha)) }}:</p>
    <div class="row justify-content-center">
        <div class="col-8">
            <ol class="list-group list-group-numbered">
                @foreach ($programacion as $actividad)
                    @if ($actividad->fecha == $fecha)
                        @if ($actividad->empleado->departamento->id == 1)
                            <li class="list-group-item">Visita médica <br>
                                {{ date('d/m/Y', strtotime($actividad->fecha)) }}
                                <b>{{ $actividad->hora }} <br>
                                    Dr/a: {{ $actividad->empleado->nombre }}
                                    {{ $actividad->empleado->apellidos }}</b>
                            </li>
                        @elseif($actividad->empleado->departamento->id == 3)
                            <li class="list-group-item">Sesión de fisioterapia <br>
                                {{ date('d/m/Y', strtotime($actividad->fecha)) }} <b>{{ $actividad->hora }} <br> Fisio:
                                    {{ $actividad->empleado->nombre }} {{ $actividad->empleado->apellidos }}</b></li>
                        @elseif($actividad->empleado->departamento->id == 4)
                            <li class="list-group-item">Grupo de terapia <br>
                                {{ date('d/m/Y', strtotime($actividad->fecha)) }} <b>{{ $actividad->hora }} <br>
                                    Terapeuta:
                                    {{ $actividad->empleado->nombre }} {{ $actividad->empleado->apellidos }}</b><br>
                                {{ $actividad->descripcion }}</li>
                        @elseif($actividad->empleado->departamento->id == 2 && $actividad->descripcion != null)
                            <li class="list-group-item">
                                {{ $actividad->descripcion }} <br>
                                {{ date('d/m/Y', strtotime($actividad->fecha)) }} <b>{{ $actividad->hora }}</b></li>
                        @else
                            <li class="list-group-item">Realizar cura en
                                {{ $actividad->zona }} en estado {{ $actividad->estado }} <br>
                                {{ date('d/m/Y', strtotime($actividad->fecha)) }} <b>{{ $actividad->hora }} <br>
                                    Enfermero/a:
                                    {{ $actividad->empleado->nombre }} {{ $actividad->empleado->apellidos }}</b></li>
                        @endif
                    @endif
                @endforeach
            </ol>
        </div>
    </div>
@endsection
