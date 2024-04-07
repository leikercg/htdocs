@extends('master')

@section('title', 'Administración de pedidos')

@section('header', 'Administración de pedidos')

@section('main_title', 'Insertar/modificar pedido')

@section('content')
    @isset($order)
        <br><br>
        <form action="{{ route('actualizarOrder', ['order' => $order->id]) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('almacenarOrder') }}" method="POST">
    @endisset
        @csrf
        <br>
        <table class='sinbordes'>
            <tr>
                <td class='sinbordes'>Producto:</td>
                <td class='sinbordes'>
                    <select name="product_id">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}"
                                @if( $product->id == ($order->product->id ?? ""))
                                    selected
                                @endif
                            >{{ $product->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td class='sinbordes'>Proveedor:</td>
                <td class='sinbordes'>
                <select name="supplier_id">
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}"
                            @if( $supplier->id == ($order->supplier->id ?? ""))
                                selected
                            @endif
                        >{{ $supplier->name }}</option>
                    @endforeach
                </select>
                </td>
            </tr>
            <tr>
                <td class='sinbordes'>Empleado de compras:</td>
                <td class='sinbordes'>
                    <select name="employee_id">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}"
                                @if( $employee->id == ($order->employee->id ?? ""))
                                    selected
                                @endif
                            >{{ $employee->name }}</option>
                        @endforeach
                    </select>
                    </td>
            </tr>
            <tr>
                <td class='sinbordes'>Cantidad:</td>
                <td class='sinbordes'><input type="number" name="amount" value="{{ $order->amount ?? '' }}" required></td>
            </tr>
            <tr>
                <td class='sinbordes'>Precio:</td>
                <td class='sinbordes'><input type="number" step="0.1" name="price" value="{{ $order->price ?? '' }}" required></td>
            </tr>
            <tr>
                <td class='sinbordes'>Comentarios:</td>
                <td class='sinbordes'><input type="text" name="comments" value="{{ $order->comments ?? '' }}" required></td>
            </tr>
            <tr>
                <td class='sinbordes'><a href="{{ route('mostrarOrders') }}">Volver al listado</a></td>
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
