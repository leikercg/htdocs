@extends('master')
@section('title', 'Home')
@section('content')
    <div class="row justify-content-around justify-content-md-center">
        <div class="col-10 col-md-2 text-center mb-3">
            <a href="{{ route('crear.residente') }}" class="btn btn-success">CREAR RESIDENTE</a>
        </div>
        <div class="col-10  col-md-2 text-center"> <a href="{{ route('lista.residentes') }}" class="btn btn-primary">VER ALTAS
            </a></div>
    </div>
    <br>
    <div class="row">
        <div class="col-12 text-center">
            <h2>LISTA DE RESIDENTES DE BAJA</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{ route('buscar.residente.bajas') }}" class="mt-4">
                <div class="mb-3">
                    <label for="busqueda" class="form-label">Búsqueda</label>
                    <input type="text" class="form-control" id="busqueda" name="busqueda">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
                <p>Para ver la lista completa despues de una búsqueda pulse enviar</p>
            </form>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-10 col-12">
            <div class="table-responsive">{{-- para desplazamiento lateral en caso de desbordamiento de pantallas --}}

                <table class="table table-hover text-center align-middle">
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
                                <td><a href="{{ route('editar.residente', ['id' => $residente->id]) }}"
                                        class="btn btn-primary">Modificar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
