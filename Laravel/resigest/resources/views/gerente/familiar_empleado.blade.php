@extends('master')
@section('title', 'Gestionar Residente')
@section('content')

    @isset($empleados)
        <div class="row justify-content-center">
            <div class="col-2 text-center">
                <a href="{{ route('crear.familiar') }}" class="btn btn-primary">Crear Familiar</a>
            </div>
            <div class="col-2 text-center">
                <a href="{{ route('crear.empleado') }}" class="btn btn-primary">Crear Empleado</a>
            </div>
        </div>

        <br><br>
        <div class="row">
            <div class="col-12 text-center">
                <h2>EMPLEADOS</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{ route('buscar.empleado') }}" class="mt-4">
                    <div class="mb-3">
                        <label for="busqueda" class="form-label">Búsqueda</label>
                        <input type="text" class="form-control" id="busqueda" name="busqueda">
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
            <p>Para ver la lista completa despues de una búsqueda pulse enviar</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-l0">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->id }}</td>
                                <td>{{ $empleado->apellidos }}</td>
                                <td>{{ $empleado->nombre }}</td>
                                <td>{{ $empleado->departamento->nombre }}</td>
                                <td>{{ $empleado->direccion }}</td>
                                <td>{{ $empleado->telefono }}</td>
                                <td>
                                    <a href="{{ route('editar.empleado', ['id' => $empleado->id]) }}"
                                        class="btn btn-primary">Modificar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @endisset
    <br><br>
    @isset($familiares)
        <div class="row">
            <div class="col-12 text-center">
                <h2>FAMILIARES</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{ route('buscar.familiar') }}" class="mt-4">
                    <div class="mb-3">
                        <label for="busqueda" class="form-label">Búsqueda</label>
                        <input type="text" class="form-control" id="busqueda" name="busqueda">
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
            <p>Para ver la lista completa despues de una búsqueda pulse enviar</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-l0">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($familiares as $familiar)
                            <tr>
                                <td>{{ $familiar->id }}</td>
                                <td>{{ $familiar->apellidos }}</td>
                                <td>{{ $familiar->nombre }}</td>
                                <td>{{ $familiar->departamento->nombre }}</td>
                                <td>{{ $familiar->direccion }}</td>
                                <td>{{ $familiar->telefono }}</td>
                                <td><a href="{{ route('editar.familiar', ['id' => $familiar->id]) }}"
                                        class="btn btn-primary">Modificar</a>
                            </tr>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endisset
@endsection
