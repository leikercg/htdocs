@extends("master")

@section("title", "Administración de productos")

@section("header", "Administración de productos")

@section("main_title", "Listado de empleados")

@section("content")
    <table class='sinbordes'>
        <tr>
            <th>Nombre</th><th>Apellidos</th><th>Departamento</th><th>Funciones</th><th class='sinbordes'></th><th class='sinbordes'></th>
        </tr>
    @foreach ($empleados as $empleado)
        <tr>
            <td class="hover">{{$empleado->name}}</td>
            <td>{{$empleado->surname}}</td>
            <td >{{$empleado->department}}</td>
            <td >{{$empleado->functions}}</td>
            <td class='sinbordes centrado'>
                <a href="{{route('modificarEmpleado',['employee'=>$empleado->id])}}">Modificar</a>
            </td>
            <td class='sinbordes'>
                <form action = "{{route('eliminarEmpleado', $empleado->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
    @endforeach
    </table><br>


    <br><br>
    <form action = "{{route('menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
@endsection