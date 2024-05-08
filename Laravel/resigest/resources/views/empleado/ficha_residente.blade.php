@extends('master')
@section('title', __('FICHA PERSONAL DE: ') . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
    <div class="row">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="{{ __('breadcrumb') }}">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('lista.residentes') }}">{{ __('Lista de residentes') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $residente->nombre }} {{ $residente->apellidos }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h2>{{ __('FICHA PERSONAL DE: ') }}<br>{{ $residente->nombre }} {{ $residente->apellidos }}</h2>
        </div>
    </div><br>
    <div class="row">
        <!--Ficha del residente -->
        <div class="col-12 col-md-4 my-2 align-items-center justify-content-center d-flex ">
            <div class="card w-100">
                <div class="card-body">
                    <h3 class="card-title">{{ $residente->nombre }} {{ $residente->apellidos }}</h3>
                    <p><b>{{ __('ID') }}:</b> {{ $residente->id }}</p>
                    <p><b>{{ __('DNI') }}:</b> {{ $residente->dni }}</p>
                    <p><b>{{ __('Edad') }}:</b> {{ $residente->edad }}</p>
                    <p><b>{{ __('Habitación') }}:</b> {{ $residente->habitacion }}</p>
                    <p><b>{{ __('Contacto') }}:</b> {{ $residente->contacto }}</p>
                    <p><b>{{ __('Estado') }}:</b> {{ $residente->estado }}</p>
                    <p><b>{{ __('Fecha de nacimiento') }}:</b> {{ date('d/m/Y', strtotime($residente->fecha_nac)) }}</p>
                    <p><b>{{ __('Fecha de ingreso') }}:</b> {{ date('d/m/Y', strtotime($residente->created_at)) }}</p>
                    <h5>{{ __('Familiares') }}:</h5>
                    <ul>
                        @foreach ($familiares as $familiar)
                            <b>{{ $familiar->nombre }} {{ $familiar->aellidos }}</b>
                            <li><b>{{ __('Dirección') }}:</b> {{ $familiar->direccion }}</li>
                            <li><b>{{ __('Teléfono de contacto') }}:</b> {{ $familiar->telefono }}</li>
                            <br>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>



        <!--Lista de  seguimientos-->
        <div class="col-10 col-md-4 offset-1 offset-md-0 my-2 align-items-center justify-content-center d-flex">
            <div class="list-group gap-1">
                <a href="{{ route('editar.seguimiento', ['id' => $residente->id, 'departamento_id' => 1]) }}"
                    class="list-group-item list-group-item-action list-group-item-primary">
                    {{ __('Seguimiento del departamento de medicina') }}
                </a>
                <a href="{{ route('editar.seguimiento', ['id' => $residente->id, 'departamento_id' => 2]) }}"
                    class="list-group-item list-group-item-action list-group-item-secondary">
                    {{ __('Seguimiento del departamento de enfermería') }}
                </a>
                <a href="{{ route('editar.seguimiento', ['id' => $residente->id, 'departamento_id' => 4]) }}"
                    class="list-group-item list-group-item-action list-group-item-success">
                    {{ __('Seguimiento del departamento de terapia') }}
                </a>
                <a href="{{ route('editar.seguimiento', ['id' => $residente->id, 'departamento_id' => 3]) }}"
                    class="list-group-item list-group-item-action list-group-item-warning">
                    {{ __('Seguimiento del departamento de fisioterapia') }}
                </a>
                <a href="{{ route('editar.seguimiento', ['id' => $residente->id, 'departamento_id' => 5]) }}"
                    class="list-group-item list-group-item-action list-group-item-danger">
                    {{ __('Seguimiento del departamento de asistencia') }}
                </a>
            </div>
        </div>


        <!--Lista de  funciones personales-->
        <div class="col-12 col-md-4 my-4 d-flex justify-content-center align-items-center">
            <div class="btn-group-vertical gap-4" role="group" aria-label="{{ __('Vertical button group') }}">
                <a href='{{ route('itinerario.residente', ['id' => $residente->id]) }}' class="btn btn-primary"
                    role="button">{{ __('Ver itinerario') }}</a>
                @if (auth()->user()->departamento_id == 1)
                    <a href="{{ route('visitas.residente', ['residente_id' => $residente->id]) }}" class="btn btn-primary"
                        role="button">{{ __('Ver visitas') }}</a>
                @elseif(auth()->user()->departamento_id == 2)
                    <a href="{{ route('curas.residente', ['residente_id' => $residente->id]) }}" class="btn btn-primary"
                        role="button">{{ __('Ver curas') }}</a>
                    <a href="{{ route('tareas.residente', ['residente_id' => $residente->id]) }}" class="btn btn-primary"
                        role="button">{{ __('Ver tareas') }}</a>
                @elseif(auth()->user()->departamento_id == 3)
                    <a href="{{ route('sesiones.residente', ['residente_id' => $residente->id]) }}" class="btn btn-primary"
                        role="button">{{ __('Ver sesiones') }}</a>
                @elseif(auth()->user()->departamento_id == 4)
                    <a href="{{ route('residente.grupos', ['residente_id' => $residente->id]) }}" class="btn btn-primary"
                        role="button">{{ __('Ver grupos') }}</a>
                @endif
            </div>
        </div>



    </div>
@endsection
