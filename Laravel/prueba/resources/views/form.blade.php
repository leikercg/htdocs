<!--Observa cómo se genera una cabecera de formulario distinta según se vaya a usar el formulario para crear o para modificar un producto. Asímismo, fíjate en cómo se rellenan los atributos value de los campos del formulario con los datos actuales del producto (en caso de que existan).-->

@extends('master')

@section('title', 'Inserción de productos')

@section('header', 'Inserción de productos')
@section('tituloSeccion', 'Modificar/borrar producto')
@section('sidebar')
    <h1>hola</h1>
@endsection

@section('content')
    <br><br><br><br>
    @isset($product)
        <form class="formProducto" action="{{ route('product.update', ['product' => $product->id]) }}" method="POST">
            @method('PUT')
        @else
            <form class="formProducto" action="{{ route('product.store') }}" method="POST">
            @endisset
            @csrf
            Nombre del producto:<input class="inputProducto" type="text" name="name"
                value="{{ $product->name ?? '' }}"><br><br>
            Descripción:<input class="inputProducto" type="text" name="description"
                value="{{ $product->description ?? '' }}"><br><br>
            Precio:<input class="inputProducto" type="text" name="price" value="{{ $product->price ?? '' }}"><br><br>
            <input type="submit">
        </form>
    @endsection
