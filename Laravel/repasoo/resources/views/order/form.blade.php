@extends('master')

@section('title', 'Pedidos por empleado')

@section('header', 'Pedidos por empleado')

@section('main_title', 'Solicitar productos')

@section('content')

        <form action="{{ route('mostrarPedido') }}" method="get">

        @csrf
        <br>
        <table class='sinbordes'>


            <tr>
                <td class='sinbordes'>Empleado solicitante:</td>
                <td class='sinbordes'>
                    <select name="employee_id">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }} {{ $employee->surname }} </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td class='sinbordes'>Producto:</td>
                <td class='sinbordes'>
                    <select name="product_id">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td class='sinbordes'>Cantidad a compar</a></td>
                <td class='sinbordes'><input type="number" name="cantidad"></td>
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
