@extends('master')
@section('title', 'Itinerario')
@section('content')
    <div class="row">
        <form method="GET" action="{{ route('itinerario.residente',['id'=>$residente->Id_residente]) }}">
            <label for="fecha" class="form-label">Selecciona una fecha:</label>
            <input type="date" id="fecha" name="fecha">
            <button type="submit">Buscar</button>
        </form>
        <br><br>
        <p>Itineario de {{date('d/m/Y', strtotime($fecha)) }}:</p>
        @foreach ($programacion as $actividad)

            @if ($actividad->Fecha == $fecha)
            <p>{{ date('d/m/Y', strtotime($actividad->Fecha)) }} {{ $actividad->Hora }} {{ $actividad->empleado->departamento->nombre }}</p>
            @endif
        @endforeach

    </div>
@endsection
