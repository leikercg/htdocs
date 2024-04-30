@extends('master')
@section('title', __('Tareas del auxiliar') . ' ' . $auxiliar->nombre . ' ' . $auxiliar->apellidos)
@section('content')
    <div class="row">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">{{ __('Lista de tareas') }}</a></li>
            </ol>
        </nav>
    </div>
    @php
        //creamos una varibale con la fecha del dia de hoy
        $hoy = now()->format('d-m-Y');
    @endphp
    <div>{{ __('Fecha') }}: {{ $hoy }}</div>
    <div class="row justify-content-center text-center">
        <h2>{{ __('TAREAS A REALIZAR HOY POR') }}: <br> {{ $auxiliar->nombre }} {{ $auxiliar->apellidos }}</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 col-12">
            <div class="table-responsive">{{-- para desplazamiento lateral en caso de desbordamiento de pantallas --}}
                <table class="table table-hover text-center align-middle">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('ID') }}</th>
                            <th scope="col">{{ __('Fecha') }}</th>
                            <th scope="col">{{ __('Hora') }}</th>
                            <th scope="col">{{ __('Enfermero/a') }}</th>
                            <th scope="col">{{ __('Residente') }}</th>
                            <th scope="col">{{ __('Descripción') }}</th>
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
                                <td>{{ $tarea->descripcion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
