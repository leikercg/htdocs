@extends('master')
@section('title', 'Tareas de ' . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
    @php
        //creamos una varibale con la fecha del dia de hoy
        $hoy = now()->format('Y-m-d');
    @endphp
    <div>{{ $hoy }}</div>
    <div class="row justify-content-center">
        <div class="col-2 text-center">
            <a href="{{ route('crear.tarea', ['residente_id' => $residente->id]) }}" class="btn btn-success">AÑADIR
                TAREA</a>
        </div>
    </div><br>
    <div class="row justify-content-center text-center">
        <div class="col">
            <h2>TAREAS DE: <br> {{ $residente->nombre }} {{ $residente->apellidos }}</h2>
        </div>
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
                        <th scope="col">Auxiliar</th>
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
                            <td>{{ $tarea->auxiliar_id}}</td>
                            <td>{{ $tarea->descripcion}}</td>
                            <td><!--Si el empleado es el que creo la tarea y la fecha aun no ha llegado se podra modificar -->
                                @if (auth()->user()->empleado->id == $tarea->empleado_id && $tarea->fecha >= $hoy)
                                    <a href="{{ route('editar.tarea', ['id' => $tarea->id]) }}"
                                        class="btn btn-primary">Modificar</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
