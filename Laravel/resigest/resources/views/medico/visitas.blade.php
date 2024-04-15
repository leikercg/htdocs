@extends('master')
@section('title', 'Visitas de ' . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
@php
//creamos una varibale con la fecha del dia de hoy
$hoy = now()->format('Y-m-d');
@endphp
   <div>{{$hoy}}</div>
    <div class="row justify-content-center">
        <div class="col-2 text-center">
            <a href="{{ route('crear.visita', ['residente_id' => $residente->id]) }}" class="btn btn-success">AÑADIR
                VISITA</a>
        </div>
    </div><br>
    <div class="row justify-content-center text-center">
        <div class="col">
            <h2>VISITAS MÉDICAS DE: <br> {{ $residente->nombre }} {{ $residente->apellidos }}</h2>
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
                        <th scope="col">Médico</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visitas as $visita)
                        <tr>
                            <td>{{ $visita->id }}</td>
                            <td>{{ date('d/m/Y', strtotime($visita->Fecha)) }} </td>
                            <td>{{ $visita->Hora }}</td>
                            <td>{{ $visita->empleado->nombre }} {{ $visita->empleado->apellidos }}</td>
                            <td><!--Si el empleado es el que creo la visita y la fecha aun no ha llegado se podra modificar -->
                                @if (auth()->user()->empleado->id == $visita->empleado_id && $visita->Fecha >= $hoy)
                                    <a href="{{ route('editar.visita', ['id' => $visita->id, 'residente_id' => $residente->id]) }}"
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
