@extends('master')
@section('title', 'Tareas del auxiliar ' . $auxiliar->nombre . ' ' . $auxiliar->nombre)
@section('content')
    @php
        //creamos una varibale con la fecha del dia de hoy
        $hoy = now()->format('d-m-Y');
    @endphp
    <div>Fecha: {{ $hoy }}</div>
    <div class="row justify-content-center text-center">
        <h2>TAREAS A REALIZAR HOY POR: <br> {{ $auxiliar->nombre }}{{ $auxiliar->nombre }}</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-10">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Enfermero/a</th>
                        <th scope="col">Auxiliar *borrar al final*</th>
                        <th scope="col">Residente</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        <tr>
                            <td>{{ $tarea->id }}</td>
                            <td>{{ date('d/m/Y', strtotime($tarea->fecha)) }} </td>
                            <td>{{ $tarea->hora }}</td>
                            <td>{{ $tarea->empleado->nombre }} {{ $tarea->empleado->apellidos }}</td>
                            <td>{{ $tarea->residente->nombre }} {{ $tarea->residente->apellidos }}</td>
                            <!--Quien le manda la tarea-->
                            <td>
                                @foreach ($auxiliares as $auxiliar)
                                    <!--En el final borrar esto, no hace falta que sal el nombre ya que son sus tareas-->
                                    @if ($auxiliar->id == $tarea->auxiliar_id)
                                        {{ $auxiliar->nombre }} {{ $auxiliar->apellidos }}
                                    @endif
                                @endforeach
                            </td>

                            <td>{{ $tarea->descripcion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
