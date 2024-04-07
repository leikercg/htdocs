@extends('master')
@section('title', $residente->Nombre . ' ' . $residente->Apellidos)
@section('content')
    <div class="row">
        <!--Ficha del residente -->
        <div class="col-12 col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">{{ $residente->Nombre }} {{ $residente->Apellidos }}</h3>
                    <p><b>DNI:</b> {{ $residente->Id_residente }}</p>
                    <p><b>Edad:</b> {{ $residente->edad }}</p>
                    <p><b>Habitación:</b> {{ $residente->Habitacion }}</p>
                    <p><b>Fecha de nacimiento:</b> {{ date('d/m/Y', strtotime($residente->Fecha_Nac)) }}</p>
                    <!-- convertir la fecha a string con formato con metodos blade-->
                    <p><b>Fecha de ingreso:</b> {{ date('d/m/Y', strtotime($residente->created_at)) }}</p>
                    <h5>Familiares:</h5>
                    <ul>
                        @foreach ($familiares as $familiar)
                            <b>{{ $familiar->Nombre }} {{ $familiar->Apellidos }}</b>
                            <li><b>Dirección:</b> {{ $familiar->Direccion }}</li>
                            <li><b>Teléfono de contacto:</b> {{ $familiar->Telefono }}</li>
                            <br>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


        <!--Lista de  seguimientos-->
        <div class="col-12 col-md-4">
            <div class="list-group">
                <a href="{{ route('seguimiento.residente', ['id' => $residente->Id_residente, 'id_departamento' => '1']) }}"
                    class="list-group-item list-group-item-action">
                    Seguimiento del departamento de medicina
                </a>
                <a href="{{ route('seguimiento.residente', ['id' => $residente->Id_residente, 'id_departamento' => '2']) }}"
                    class="list-group-item list-group-item-action">
                    Seguimiento del departamento de enfermería
                </a>
                <a href="{{ route('seguimiento.residente', ['id' => $residente->Id_residente, 'id_departamento' => '4']) }}"
                    class="list-group-item list-group-item-action">
                    Seguimiento del departamento de terapia
                </a>
                <a href="{{ route('seguimiento.residente', ['id' => $residente->Id_residente, 'id_departamento' => '3']) }}"
                    class="list-group-item list-group-item-action">
                    Seguimiento del departamento de fisioterapia
                </a>
                <a href="{{ route('seguimiento.residente', ['id' => $residente->Id_residente, 'id_departamento' => '5']) }}"
                    class="list-group-item list-group-item-action">
                    Seguimiento del departamento de asistencia
                </a>
            </div>
        </div>

        <!--Lista de  funciones personales-->
        <div class="col-12 col-md-4">
            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                <a href='{{route('itinerario.residente',['id'=>$residente->Id_residente])}}' class="btn btn-primary" role="button">Ver itinerario</a>
                <a href="#" class="btn btn-primary" role="button">Enlace 2</a>
                <a href="#" class="btn btn-primary" role="button">Enlace 3</a>
                <a href="#" class="btn btn-primary" role="button">Enlace 4</a>
            </div>
        </div>

    </div>
@endsection
