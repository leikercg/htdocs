@extends("master")

@section("title", "Administración de Empleados")

@section("header", "Administración de Empleados")

@section("main_title", "Listado de emmppppleados")

@section("content")
    <table class='sinbordes'>
        <tr>
            <th>Nombre</th><th>Apellidos</th><th>Departamento</th><th>Funciones</th><th class='sinbordes'></th><th class='sinbordes'></th>
        </tr>
    @foreach ($employeeList as $employee)
        <tr>
            <td class="derecha">{{$employee->name}}</td>
            <td class="derecha">{{$employee->surname}}</td>
            <td class='derecha'>{{$employee->department}}</td>
            <td class='derecha'>{{$employee->functions}}</td>
            <td class='sinbordes centrado'>
                <a href="{{route('editarEmpleado', $employee->id)}}">Modificar</a>
            </td>
            <td class='sinbordes'>
                <!-- <form action = "{{route('mostrarEmpleado', $employee->id)}}" method="POST"> aqui el valor del la variable tiene que tener el mismo que en el de la ruta -->
                <form action = "{{route('borrarEmpleado',$employee->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
    @endforeach
    </table><br>
    <a href="{{ route('crearEmpleado') }}">Nuevo empleado</a>

    <br><br>
    <form action = "{{route('menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
@endsection