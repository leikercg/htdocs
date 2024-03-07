@extends('master')

@section('title', 'Pedidos por empleaado')

@section('header', 'Pedidos por empleado')

@section('main_title', 'Producto solicitado')

@section('content')




        <br>
        <table class='sinbordes'>


            <tr>
                <td class='sinbordes'>Producto solicitado : {{$product->name}}</td>

            </tr>

            <tr>
                <td class='sinbordes'>Stok:{{$product->stock}}</td>
            </tr>

            <tr>
                <td class="sinbordes">Cantidad solicitada: {{$cantidad}}</td>
            </tr>

            <tr>
                <td class="sinbordes"> Empleado solicitante: {{$employee->name}} con id {{$employee->id}}</td>
            </tr>

        </table>


    <br><br>
    <form action = "{{ route('menu') }}" method="GET" class="centrado">
        @csrf
        <input type="submit" value="MENÚ PRINCIPAL">
    </form>

@endsection
