@extends('master')

@section('title', 'Administración de productos')

@section('header', 'Administración de productos')

@section('main_title', 'Insertar/modificar empleado')

@section('content')
    @isset($empleado)
        <br><br>
        <form action="{{ route('modificarEmpleado', ['employee' => $empleado->id]) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('almacenarEmpleado') }}" method="POST">
    @endisset
            @csrf
            <br>
            <table class='sinbordes'>
                <tr>
                    <td class='sinbordes'>Nombre:</td>
                    <td class='sinbordes'><input type="text" name="name" value="{{ $empleado->name ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Apellidos:</td>
                    <td class='sinbordes'><input type="text" name="description" value="{{ $empleado->surname ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Departamento:</td>
                    <td class='sinbordes'><input type="text" name="price" value="{{ $empleado->department ?? '' }}" required></td>
                </tr>
                <tr>
                    <td class='sinbordes'>Funciones:</td>
                    <td class='sinbordes'><input type="text" name="stock" value="{{ $empleado->functions ?? '' }}" required></td>
                </tr>

                <tr>
                    <td class='sinbordes'><a href="{{ route('mostrarEmpleados') }}">Volver al listado</a></td>
                    <td class='sinbordes'><input type="submit"></td>
                </tr>
            </table>
        </form>

        <br><br>
        <form action = "{{route('menu')}}" method="GET" class="centrado">
            @csrf
            <input type="submit" value="MENÚ PRINCIPAL">
        </form>
@endsection
