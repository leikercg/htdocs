@extends('master')
@section('title', 'Home')
@section('content')
    <div class="row justify-content-center">
        <div class="col-2 text-center"> <a href="{{ route('crear.residente') }}" class="btn btn-primary">Crear Residente</a>
        </div>
        <div class="col-2 text-center"> <a href="{{ route('lista.completa.residentes') }}" class="btn btn-primary">Ver Bajas
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12 text-center">
            <h2>Lista de Residentes</h2>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('buscar.residente') }}">
            <label for="busquda"></label><br><br>
            <input type="text" name="busqueda" id="busquda"> <br><br>
            <input type="submit">
        </form>
        <p>Para ver la lista completa despues de una búsqueda pulse enviar</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-10">
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
                            <td>
                                <a href="{{ route('editar.residente', ['id' => $residente->id]) }}"
                                    class="btn btn-primary">Modificar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
