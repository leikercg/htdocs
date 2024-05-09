{{-- Vista general de la lista de residentes --}}
@extends('master')
@section('title', __('Home'))


@section('content')
    <div class="row">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="{{ __('breadcrumb') }}"> {{-- BreadCrumbs--}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">{{ __('Lista de residentes') }}</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h2>{{ __('LISTA DE RESIDENTES') }}</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{ route('buscar.residente') }}" class="mt-4">
                <div class="mb-3">
                    <label for="busqueda" class="form-label">{{ __('Búsqueda') }}</label>
                    <input type="text" class="form-control" id="busqueda" name="busqueda">
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Buscar') }}</button>
                <p>{{ __('Para ver la lista completa despues de una búsqueda pulse enviar') }}</p>
            </form>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 col-sm-8">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('ID') }}</th>
                            <th scope="col">{{ __('Apellidos') }}</th>
                            <th scope="col">{{ __('Nombre') }}</th>
                            <th scope="col">{{ __('Edad') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($residentes as $residente)
                            <tr onclick="window.location='{{ route('ficha.residente', $residente->id) }}';"> {{-- Al pulsar en la fila nos lleva a la ruta especificada--}}
                                <td>{{ $residente->id }}</td>
                                <td>{{ $residente->apellidos }}</td>
                                <td>{{ $residente->nombre }}</td>
                                <td>{{ $residente->edad }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
