{{--Lista de empleados y familiares--}}
@extends('master')
@section('title', __('Gestionar Residente'))
@section('content')

    @isset($empleados)
        <div class="row justify-content-around justify-content-md-center">
            <div class="col-10 col-md-2 text-center mb-3">
                <a href="{{ route('crear.familiar') }}" class="btn btn-success">{{ __('CREAR FAMILIAR') }}</a>
            </div>
            <div class="col-10  col-md-2 text-center">
                <a href="{{ route('crear.empleado') }}" class="btn btn-primary">{{ __('CREAR EMPLEADO') }}</a>
            </div>
        </div>

        <div class="row justify-content-around justify-content-md-center">
            <div class="col-10 col-md-2 text-center mb-3">
                <a href="#familiares" class="btn btn-info">{{ __('FAMILIARES') }}</a>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-12 text-center">
                <h2>{{ __('EMPLEADOS') }}</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{ route('buscar.empleado') }}" class="mt-4">
                    <div class="mb-3">
                        <label for="busqueda" class="form-label">{{ __('Búsqueda') }}</label>
                        <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="{{__('Buscar por coincidencia en nombre o apellido')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Buscar') }}</button>
                    <p>{{ __('Para ver la lista completa despues de una búsqueda pulse enviar') }}</p>
                </form>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-12">
                <div class="table-responsive">{{-- para desplazamiento lateral en caso de desbordamiento de pantallas --}}
                    <table class="table table-hover text-center align-middle">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('ID') }}</th>
                                <th scope="col">{{ __('Apellidos') }}</th>
                                <th scope="col">{{ __('Nombre') }}</th>
                                <th scope="col">{{ __('Departamento') }}</th>
                                <th scope="col">{{ __('Dirección') }}</th>
                                <th scope="col">{{ __('Teléfono') }}</th>
                                <th scope="col">{{ __('Estado') }}</th>
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
                                    <td>{{ $empleado->estado }}</td>
                                    <td>
                                        <a href="{{ route('editar.empleado', ['id' => $empleado->id]) }}"
                                            class="btn btn-primary">{{ __('Modificar') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endisset
    <br><br>
    @isset($familiares)
        <div class="row">
            <div class="col-12 text-center">
                <h2 id="familiares">{{ __('FAMILIARES') }}</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{ route('buscar.familiar') }}" class="mt-4">
                    <div class="mb-3">
                        <label for="busqueda" class="form-label">{{ __('Búsqueda') }}</label>
                        <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="{{__('Buscar por coincidencia en nombre o apellido')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Buscar') }}</button>
                    <p>{{ __('Para ver la lista completa despues de una búsqueda pulse enviar') }}</p>
                </form>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-12">
                <div class="table-responsive">{{-- para desplazamiento lateral en caso de desbordamiento de pantallas --}}
                    <table class="table table-hover text-center align-middle">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('ID') }}</th>
                                <th scope="col">{{ __('Apellidos') }}</th>
                                <th scope="col">{{ __('Nombre') }}</th>
                                <th scope="col">{{ __('Departamento') }}</th>
                                <th scope="col">{{ __('Familiar') }}</th>
                                <th scope="col">{{ __('Teléfono') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($familiares as $familiar)
                                <tr>
                                    <td>{{ $familiar->id }}</td>
                                    <td>{{ $familiar->apellidos }}</td>
                                    <td>{{ $familiar->nombre }}</td>
                                    <td>{{ $familiar->departamento->nombre }}</td>
                                    <td>
                                        {{--mostramos todos sus residentes internos--}}
                                        @forelse ($familiar->residentes as $residente)
                                            {{ $residente->nombre }} {{ $residente->apellidos }}@if (!$loop->last)
                                                <br>
                                            @endif
                                            @empty<!--Borrar, usado solo para pruebas-->
                                                Sin residentes
                                            @endforelse
                                        </td>
                                        <td>{{ $familiar->telefono }}</td>
                                        <td><a href="{{ route('editar.familiar', ['id' => $familiar->id]) }}"
                                                class="btn btn-primary">{{ __('Modificar') }}</a>
                                    </tr>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endisset
    @endsection
