@extends('master')
@section('title', 'Sesiones de ' . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
@php
//creamos una varibale con la fecha del dia de hoy
$hoy = now()->format('Y-m-d');
@endphp
   <div>{{$hoy}}</div>
    <div class="row justify-content-center">
        <div class="col-2 text-center">
            <a href="{{ route('crear.sesion', ['residente_id' => $residente->id]) }}" class="btn btn-success">AÑADIR
                VISITA</a>
        </div>
    </div><br>
    <div class="row justify-content-center text-center">
        <div class="col">
            <h2>SESIONES DE: <br> {{ $residente->nombre }} {{ $residente->apellidos }}</h2>
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
                        <th scope="col">Fisio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sesiones as $sesion)
                        <tr>
                            <td>{{ $sesion->id }}</td>
                            <td>{{ date('d/m/Y', strtotime($sesion->fecha)) }} </td><!--formato de la fecha-->
                            <td>{{ $sesion->hora }}</td>
                            <td>{{ $sesion->empleado->nombre }} {{ $sesion->empleado->apellidos }}</td>
                            <td><!--Si el empleado es el que creo la sesion y la fecha aun no ha llegado se podra modificar -->
                                @if (auth()->user()->empleado->id == $sesion->empleado_id && $sesion->fecha >= $hoy)
                                    <a href="{{ route('editar.sesion', ['id' => $sesion->id, 'residente_id' => $residente->id]) }}"
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
