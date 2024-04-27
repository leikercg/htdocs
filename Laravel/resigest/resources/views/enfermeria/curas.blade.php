@extends('master')
@section('title', 'Curas de ' . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
    @php
        //creamos una varibale con la fecha del dia de hoy
        $hoy = now()->format('Y-m-d');
    @endphp
    <div>{{ $hoy }}</div>
    <div class="row justify-content-center">
        <div class="col-4 col-md-2 text-center">
            <a href="{{ route('crear.cura', ['residente_id' => $residente->id]) }}" class="btn btn-success">AÑADIR
                CURA</a>
        </div>
    </div><br>
    <div class="row justify-content-center text-center">
        <div class="col">
            <h2>CURAS DE: <br> {{ $residente->nombre }} {{ $residente->apellidos }}</h2>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-10 col-12">
                <div class="table-responsive">{{-- para desplazamiento lateral en caso de desbordamiento de pantallas --}}
                    <table class="table table-hover text-center align-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Enfermero/a</th>
                                <th scope="col">Zona</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($curas as $cura)
                                <tr>
                                    <td>{{ $cura->id }}</td>
                                    <td>{{ date('d/m/Y', strtotime($cura->fecha)) }} </td>
                                    <td>{{ $cura->hora }}</td>
                                    <td>{{ $cura->empleado->nombre }} {{ $cura->empleado->apellidos }}</td>
                                    <td>{{ $cura->zona }}</td>
                                    <td>{{ $cura->estado }}</td>
                                    <td><!--Si el empleado es el que creo la cura y la fecha aun no ha llegado se podra modificar -->
                                        @if (auth()->user()->empleado->id == $cura->empleado_id && $cura->fecha >= $hoy)
                                            <a href="{{ route('editar.cura', ['id' => $cura->id, 'residente_id' => $residente->id]) }}"
                                                class="btn btn-primary">Modificar</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection
