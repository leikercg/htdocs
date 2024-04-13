@extends('master')
@section('title', 'Home')
@section('content')


    <div class="row justify-content-center">
        <div class="col-2">
            <button> <a href="{{ route('crear.residente') }}">Crear Residente</a></button>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-12 text-center">
            <h2>Lista de Residentes de Baja</h2>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-l0">
            <table class="table table-hover text-center">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($residentes as $residente)
                    <tr onclick="window.location='{{ route('ficha.residente', $residente->id) }}';">
                        <td>{{ $residente->id }}</td>
                        <td>{{ $residente->apellidos }}</td>
                        <td>{{ $residente->nombre }}</td>
                        <td>{{ $residente->edad }}</td>
                        <td>{{ $residente->estado }}</td>
                        <td><a href="{{ route('editar.residente', ['id' => $residente->id]) }}">Modificar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

@endsection
