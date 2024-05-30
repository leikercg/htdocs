{{--Vista de un segumiento de residente--}}
@extends('master')
@section('title', $residente->nombre . ' ' . $residente->apellidos)

@section('content')
    <div class="row">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('lista.residentes') }}">{{ __('Lista de residentes') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ficha.residente', $residente->id) }}">{{ $residente->nombre }}
                        {{ $residente->apellidos }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Seguimiento de') }}
                    {{ $seguimiento->departamento->nombre }}</li>
            </ol>
        </nav>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="list-group">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="list-group">
                            <div
                            {{--Dependiendo del segumineto tiene un color el titulo--}}
                                class="list-group-item
                @if ($seguimiento->departamento->id == 1) list-group-item-primary
                @elseif ($seguimiento->departamento->id == 2) list-group-item-secondary
                @elseif ($seguimiento->departamento->id == 3) list-group-item-warning
                @elseif ($seguimiento->departamento->id == 4) list-group-item-success
                @elseif ($seguimiento->departamento->id == 5) list-group-item-danger @endif">
                                <h3>{{ __('Seguimiento de') }} {{ $residente->nombre }} {{ $residente->apellidos }}
                                    {{ __('en') }}
                                    {{ $seguimiento->departamento->nombre }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-10 col-sm-8">
            <form action="{{ route('actualizar.seguimiento', ['id' => $seguimiento->id]) }}" method="POST">
                @method('put')
                {{--Bucle de pruebas, BOOOOOOORRRRRRRRRRRRRRRRRRRRRRRAR--}}
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ __('Seguimiento') }}:</label>
                    <textarea id="textarea" class="form-control" rows="15" disabled>{{ $seguimiento->seguimiento }}</textarea>
                </div>

                @if ($seguimiento->departamento_id == auth()->user()->departamento_id)
                    <textarea class="form-control" name="seguimiento" rows="3" placeholder="Añada nuevo seguimiento... " autofocus></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary"
                        onclick="return confirm('¿Estás seguro de que deseas modificar esta seguimiento?')">Añadir</button>
                @endif

            </form>
        </div>

    </div>

    <div class="row justify-content-center">
        <div class="col-2 col-sm-1">
            <a class="btn btn-primary" href="{{ route('ficha.residente', $residente->id) }}">{{ __('Volver') }}</a>
        </div>
    </div>




@endsection
