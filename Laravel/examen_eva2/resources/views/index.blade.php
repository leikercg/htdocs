@extends('master')

@section('title', 'Gestión de empresa')

@section('header', 'Gestión de empresa')

@section('main_title', 'Registros de la base de datos')

@section('content')
    <table class="sinbordes">
        <tr>
            <td class="sinbordes mitad">
                <form action = "{{ route('product.index') }}" method="GET" class="centrado">
                    @csrf
                    <input type="submit" value="Productos en stock" class="grande">
                </form>
            </td>
            <td class="sinbordes mitad">
                <form action = "{{ route('supplier.index') }}" method="GET" class="centrado">
                    @csrf
                    <input type="submit" value="Proveedores" class="grande">
                </form>
            </td>
        </tr>
        <tr>
            <td class="sinbordes mitad">
                <form action = "{{ route('contact.index') }}" method="GET" class="centrado">
                    @csrf
                    <input type="submit" value="Contactos" class="grande">
                </form>
            </td>
            <td class="sinbordes mitad">
                <form action = "{{ route('employee.index') }}" method="GET" class="centrado">
                    @csrf
                    <input type="submit" value="Empleados" class="grande">
                </form>
            </td>
        </tr>
        <tr>
            <td class="sinbordes mitad">
                <form action = "{{ route('supplier.products') }}" method="GET" class="centrado">
                    @csrf
                    <input type="submit" value="Productos por proveedor" class="grande">
                </form>
            </td>
            <td class="sinbordes mitad">

                <form action = "{{ route('order.form') }}" method="GET" class="centrado">
                    @csrf
                    <input type="submit" value="Realizar pedidos" class="grande">
                </form>
            </td>
        </tr>
        <tr>
            <td class="sinbordes mitad" colspan="2">
                <form action = "{{ route('mostrarOrders') }}" method="GET" class="centrado">
                    @csrf
                    <input type="submit" value="Pedidos" class="grande">
                </form>
            </td>
        </tr>
    </table>
@endsection
