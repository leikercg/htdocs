{{--Vista de la lista de curas--}}
@extends('master')
@section('title', __('Curas de ') . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
    <div class="row">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="{{ __('breadcrumb') }}">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('lista.residentes') }}">{{ __('Lista de residentes') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ficha.residente', $residente->id) }}">{{ $residente->nombre }}
                        {{ $residente->apellidos }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Curas') }}</li>
            </ol>
        </nav>
    </div>
    @php
        //creamos una varibale con la fecha del dia de hoy
        $hoy = now()->format('d-m-Y');
    @endphp
    <div><b>{{ $hoy }}</b></div>
    <div class="row justify-content-center">
        <div class="col-4 col-md-2 text-center">
            <a href="{{ route('crear.cura', ['residente_id' => $residente->id]) }}" class="btn btn-success">{{ __('AÑADIR CURA') }}</a>
        </div>
    </div><br>
    <div class="row justify-content-center text-center">
        <div class="col">
            <h2>{{ __('CURAS DE: ') }} <br> {{ $residente->nombre }} {{ $residente->apellidos }}</h2>
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
                            <th scope="col">{{ __('Enfermero/a') }}</th>
                            <th scope="col">{{ __('Zona') }}</th>
                            <th scope="col">{{ __('Estado') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($curas as $cura)
                            <tr @if (date('d-m-Y', strtotime($cura->fecha))== $hoy)
                                class="table-success"
                            @endif>
                                <td>{{ $cura->id }}</td>
                                <td>{{ date('d/m/Y', strtotime($cura->fecha)) }} </td>
                                <td>{{ $cura->hora }}</td>
                                <td>{{ $cura->empleado->nombre }} {{ $cura->empleado->apellidos }}</td>
                                <td>{{ $cura->zona }}</td>
                                <td>{{ $cura->estado }}</td>
                                <td><!--Si el empleado es el que creo la cura y la fecha aun no ha llegado se podra modificar -->
                                    @if (auth()->user()->empleado->id == $cura->empleado_id && $cura->fecha >= $hoy)
                                        <a href="{{ route('editar.cura', ['id' => $cura->id, 'residente_id' => $residente->id]) }}"
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
