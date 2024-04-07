@extends('master')
@section('title', 'Home')


@section('content')
    <div id="main" class="container py-4">
        <div class="row justify-content-center">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Edad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($residentes as $residente)
                        <tr onclick="window.location='{{ route('ficha.residente', $residente->Id_residente) }}';">
                            <td>{{ $residente->Id_residente }}</td>
                            <td>{{ $residente->Apellidos }}</td>
                            <td>{{ $residente->Nombre }}</td>
                            <td>{{ $residente->edad }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
