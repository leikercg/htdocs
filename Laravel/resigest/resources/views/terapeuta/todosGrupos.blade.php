{{-- Lista de todos los grupos existentes --}}
@extends('master')
@section('title', __('Gestionar grupos'))
@section('content')
    <div class="row">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">{{ __('Todos los grupos') }}</a></li>
            </ol>
        </nav>
    </div>

    @php
        $hoy = now()->format('d-m-Y'); // creamos la fehca de hoy
    @endphp
    <div><b>{{ $hoy }}</b></div>
    <div class="row justify-content-center">
        <div class="col-4 col-md-2 text-center">
            <a href="{{ route('crear.grupo') }}" class="btn btn-success">{{ __('CREAR GRUPO') }}</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-12 text-center">
            <h2>{{ __('LISTA DE GRUPOS') }}</h2>
        </div>
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
                            <th scope="col">{{ __('Terapeuta') }}</th>
                            <th scope="col">{{ __('Descripción') }}</th>
                            <th scope="col">{{ __('Participantes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grupos as $grupo)
                            <tr @if ($grupo->fecha == $hoy) class="table-success" @endif>
                                <td>{{ $grupo->id }}</td>
                                <td>{{ date('d/m/Y', strtotime($grupo->fecha)) }}</td>
                                <td>{{ $grupo->hora }}</td>
                                <td>{{ $grupo->empleado->nombre }} {{ $grupo->empleado->apellidos }}</td>
                                <td>{{ $grupo->descripcion }}</td>
                                <td>
                                    @forelse ($grupo->residentes as $residente)
                                        {{ $residente->nombre }} {{ $residente->apellidos }} <br>
                                        @if (!$loop->last)
                                            <!--Si la fila es la ultima hacer salto de linea-->
                                            <br>
                                        @endif
                                    @empty<!--Borrar, usado solo para pruebas-->
                                        {{ __('Sin Participantes') }}
                                    @endforelse
                                </td>
                                <td><!--Si el empleado es el que creo el grupo y la fecha aun no ha llegado se podrá modificar -->
                                    @if (auth()->user()->empleado->id == $grupo->empleado_id && $grupo->fecha >= $hoy)
                                        <a href="{{ route('editar.grupo', ['id' => $grupo->id]) }}"
                                            class="btn btn-primary">{{ __('Modificar') }}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
