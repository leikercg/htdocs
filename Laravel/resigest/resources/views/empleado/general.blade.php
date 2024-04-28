@extends('master')
@section('title', 'Home')


@section('content')
    <div class="row">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Lista de residentes</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h2>LISTA DE RESIDENTES</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{ route('buscar.residente') }}" class="mt-4">
                <div class="mb-3">
                    <label for="busqueda" class="form-label">Búsqueda</label>
                    <input type="text" class="form-control" id="busqueda" name="busqueda">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
                <p>Para ver la lista completa despues de una búsqueda pulse enviar</p>
            </form>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 col-sm-8">
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
    </div>


@endsection
