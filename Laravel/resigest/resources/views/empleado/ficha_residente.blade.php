@extends('master')
@section('title', $residente->nombre . ' ' . $residente->apellidos)
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h2>FICHA PERSONAL DE: <br>{{ $residente->nombre }} {{ $residente->apellidos }}</h2>
        </div>
    </div><br>
    <div class="row">
        <!--Ficha del residente -->
        <div class="col-12 col-md-4 d-flex align-items-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h3 class="card-title">{{ $residente->nombre }} {{ $residente->apellidos }}</h3>
                    <p><b>ID:</b> {{ $residente->id }}</p>
                    <p><b>DNI:</b> {{ $residente->dni }}</p>
                    <p><b>Edad:</b> {{ $residente->edad }}</p>
                    <p><b>Habitación:</b> {{ $residente->habitacion }}</p>
                    <p><b>Fecha de nacimiento:</b> {{ date('d/m/Y', strtotime($residente->fecha_nac)) }}</p>
                    <!-- convertir la fecha a string con formato con metodos blade-->
                    <p><b>Fecha de ingreso:</b> {{ date('d/m/Y', strtotime($residente->created_at)) }}</p>
                    <h5>Familiares:</h5>
                    <ul>
                        @foreach ($familiares as $familiar)
                            <b>{{ $familiar->nombre }} {{ $familiar->aellidos }}</b>
                            <li><b>Dirección:</b> {{ $familiar->direccion }}</li>
                            <li><b>Teléfono de contacto:</b> {{ $familiar->telefono }}</li>
                            <br>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>



        <!--Lista de  seguimientos-->
        <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
            <div class="list-group gap-4">
                <a href="{{ route('seguimiento.residente', ['id' => $residente->id, 'departamento_id' => 1]) }}"
                    class="list-group-item list-group-item-action">
                    Seguimiento del departamento de medicina
                </a>
                <a href="{{ route('seguimiento.residente', ['id' => $residente->id, 'departamento_id' => 2]) }}"
                    class="list-group-item list-group-item-action">
                    Seguimiento del departamento de enfermería
                </a>
                <a href="{{ route('seguimiento.residente', ['id' => $residente->id, 'departamento_id' => 4]) }}"
                    class="list-group-item list-group-item-action">
                    Seguimiento del departamento de terapia
                </a>
                <a href="{{ route('seguimiento.residente', ['id' => $residente->id, 'departamento_id' => 3]) }}"
                    class="list-group-item list-group-item-action">
                    Seguimiento del departamento de fisioterapia
                </a>
                <a href="{{ route('seguimiento.residente', ['id' => $residente->id, 'departamento_id' => 5]) }}"
                    class="list-group-item list-group-item-action">
                    Seguimiento del departamento de asistencia
                </a>
            </div>
        </div>


        <!--Lista de  funciones personales-->
        <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
            <div class="btn-group-vertical gap-4" role="group" aria-label="Vertical button group">
                <a href='{{ route('itinerario.residente', ['id' => $residente->id]) }}' class="btn btn-primary" role="button">Ver itinerario</a>
                @if (auth()->user()->departamento_id == 1)
                    <a href="{{route('visitas.residente',['residente_id'=>$residente->id])}}" class="btn btn-primary" role="button">Ver visitas</a>
                @elseif(auth()->user()->departamento_id == 2)
                    <a href="#" class="btn btn-primary" role="button">Ver tareas</a>
                    <a href="{{route('curas.residente',['residente_id'=>$residente->id])}}" class="btn btn-primary" role="button">Ver curas</a>
                @elseif(auth()->user()->departamento_id == 3)
                    <a href="{{route('sesiones.residente',['residente_id'=>$residente->id])}}" class="btn btn-primary" role="button">Ver sesiones</a>
                @elseif(auth()->user()->departamento_id == 4)
                    <a href="#" class="btn btn-primary" role="button">Ver grupos</a>
                @endif
            </div>
        </div>



    </div>
@endsection
