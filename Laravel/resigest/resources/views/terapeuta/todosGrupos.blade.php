@extends('master')
@section('title', 'Gestionar grupos')
@section('content')

    @php
        $hoy = now()->format('Y-m-d'); // creamos la fehca de hoy
    @endphp
       <div class="row justify-content-center">
        <div class="col-2 text-center">
            <a href="{{ route('crear.grupo') }}" class="btn btn-success">CREAR GRUPO</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-12 text-center">
            <h2>LISTA DE GRUPOS</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Terapeuta</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Participantes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grupos as $grupo)
                        <tr>
                            <td>{{ $grupo->id }}</td>
                            <td>{{ $grupo->fecha }}</td>
                            <td>{{ $grupo->hora }}</td>
                            <td>{{ $grupo->empleado->nombre}} {{ $grupo->empleado->apellidos}}</td>
                            <td>{{ $grupo->descripcion }}</td>
                            <td>
                                @forelse ($grupo->residentes as $residente)
                                    {{ $residente->nombre }} {{ $residente->apellidos }}@if (!$loop->last)
                                        <!--Si la fila es la ultima hacer salto de linea-->
                                        <br>
                                    @endif
                                    @empty<!--Borrar, usado solo para pruebas-->
                                        Sin Participantes
                                    @endforelse
                                </td>
                                <td><!--Si el empleado es el que creo el grupo y la fecha aun no ha llegado se podrá modificar -->
                                    @if (auth()->user()->empleado->id == $grupo->empleado_id && $grupo->fecha >= $hoy)
                                    <a href="{{ route('editar.grupo',['id'=>$grupo->id]) }}" class="btn btn-primary">Modificar</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>



        @endsection
