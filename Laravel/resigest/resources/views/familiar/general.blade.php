@extends('master')
@section('title', 'Familiares')

@section('content')
<div class="row">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="{{ __('breadcrumb') }}">
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
                            <tr onclick="window.location='{{ route('ficha.residente', $residente->id) }}';">
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
