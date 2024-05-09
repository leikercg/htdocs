{{--Vista de la lista de visitas de un residente--}}
@extends('master')
@section('title', __('Visitas de ') . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
<div class="row">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('lista.residentes') }}">{{ __('Lista de residentes') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ficha.residente', $residente->id) }}">{{ $residente->nombre }} {{ $residente->apellidos }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Visitas') }}</li>
        </ol>
    </nav>
</div>
    @php
        //creamos una varibale con la fecha del dia de hoy
        $hoy = now()->format('Y-m-d');
    @endphp
    <div><b>{{ $hoy }}</b></div>
    <div class="row justify-content-center">
        <div class="col-4 col-md-2 text-center">
            <a href="{{ route('crear.visita', ['residente_id' => $residente->id]) }}" class="btn btn-success">{{ __('AÑADIR VISITA') }}</a>
        </div>
    </div><br>
    <div class="row justify-content-center text-center">
        <div class="col">
            <h2>{{ __('VISITAS MÉDICAS DE:') }} <br> {{ $residente->nombre }} {{ $residente->apellidos }}</h2>
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
                            <th scope="col">{{ __('Médico') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visitas as $visita)
                        <tr @if ($visita->fecha==$hoy)   class="table-success"  @endif>
                            <td>{{ $visita->id }}</td>
                                <td>{{ date('d/m/Y', strtotime($visita->fecha)) }} </td>
                                <td>{{ $visita->hora }}</td>
                                <td>{{ $visita->empleado->nombre }} {{ $visita->empleado->apellidos }}</td>
                                <td ><!--Si el empleado es el que creo la visita y la fecha aun no ha llegado se podra modificar -->
                                    @if (auth()->user()->empleado->id == $visita->empleado_id && $visita->fecha >= $hoy)
                                        <a href="{{ route('editar.visita', ['id' => $visita->id, 'residente_id' => $residente->id]) }}"
                                            class="btn btn-primary">{{ __('Modificar') }}</a>
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
