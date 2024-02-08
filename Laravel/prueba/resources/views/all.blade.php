@extends('master')

@section('title', 'Administración de productos')<!--En esta seccion se ingresara esto-->

@section('header', 'Administración de productos')

@section('content')


    <table class="tablaProductos">
        <tr>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Precio</th>
        </tr>
        @foreach ($productList as $product)
            <tr>
                <td class="producto">{{ $product->name }}</td>
                <td class="descripcion">{{ $product->description }}</td>
                <td class="precio">{{ $product->price }}</td>

                <td class="noBorde">
                    <a href="{{ route('product.edit', $product->id) }}">Modificar</a>
                </td>
                <td class="noBorde">
                    <form action = "{{ route('product.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Borrar">
                    </form>
                </td>
                <br>
        @endforeach
    </table>
    <a href="{{ route('product.create') }}">Nuevo artículo</a>
@endsection
@section('footer')
@section('tituloSeccion',"Listado de productos")
