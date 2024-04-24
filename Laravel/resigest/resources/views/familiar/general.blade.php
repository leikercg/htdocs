@extends('master')
@section('title', 'Familiares')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h2>LISTA DE RESIDENTES</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Edad</th>
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
@endsection
