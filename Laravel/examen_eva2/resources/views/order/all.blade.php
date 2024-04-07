@extends("master")

@section("title", "Lista de pedidos")

@section("header", "Administración de pedidos")

@section("main_title", "Listado de pedidos")

@section("content")
    <table class='sinbordes'>
        <tr>
            <th>Producto</th><th>Proveedor</th><th>Empleado de compras</th><th>Cantidad</th><th>Precio</th><th>Comentarios</th><th class='sinbordes'></th><th class='sinbordes'></th>
        </tr>
    @foreach ($orderList as $order)
        <tr>
            <td>{{$order->product->name}}</td>
            <td>{{$order->supplier->name}}</td>
            <td>{{$order->employee->name}} {{$order->employee->surname}} </td>
            <td>{{$order->amount}}</td>
            <td>{{$order->price}}</td>
            <td>{{$order->comments}}</td>
            <td class='sinbordes centrado'>
                <a href="{{route('editarOrder',['order'=>$order->id])}}">Modificar</a>
            </td>
            <td class='sinbordes'>
                <form action = "{{route('borrarOrder', $order->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
    @endforeach
    </table><br>
    <a href="{{route('crearOrder')}}">Nuevo Pedido</a>
    <br><br>
    <form action = "{{route('menu')}}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>
@endsection