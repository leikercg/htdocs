{{--Plantilla para imprimir la agenda de un empleado distinto a axiliar--}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impresiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
{{--Logo--}}
    <div class="row">
        <div class="col-2">
            <img id="impirmir" src="{{ asset('images/logo_impresora.png') }}" alt="Logo de Fundación Rey Ardid">
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h2>{{ __('Itinerario de') }} {{ $empleado->nombre }} {{ $empleado->apellidos }}</h2>
        </div>
    </div>
    <br>
    <br><br>
    <p>{{ __('Itinerario de') }} {{ date('d/m/Y', strtotime($fecha)) }}:</p>
    <div class="row justify-content-center">
        <div class="col-10 col-md-8">
            <ol class="list-group list-group-numbered">
                {{--Lista de tareas--}}
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
                                    {{ $actividad->residente->nombre }} {{ $actividad->residente->apellidos }}</b>
                            </li>
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
                                    {{ $actividad->residente->nombre }} {{ $actividad->residente->apellidos }}</b>
                            </li>
                        @endif
                    @endif
                @endforeach
            </ol>
        </div>
    </div>
</body>

</html>
