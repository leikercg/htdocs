@extends('master')
@section('title', 'Crear cura para ' . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
    @isset($cura->id)
        <div class="row">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('lista.residentes') }}">Lista de residentes</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ficha.residente', $residente->id) }}">{{ $residente->nombre }}
                            {{ $residente->apellidos }}</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('curas.residente', ['residente_id' => $residente->id]) }}">Curas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modificar cura</li>
                </ol>
            </nav>
            <div class="col-12 text-center">
                <h2>MODIFICAR CURA A: <br> {{ $residente->nombre . ' ' . $residente->apellidos }} </h2>
            </div>
        </div>
    @else
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('lista.residentes') }}">Lista de residentes</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ficha.residente', $residente->id) }}">{{ $residente->nombre }}
                        {{ $residente->apellidos }}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('curas.residente', ['residente_id' => $residente->id]) }}">Curas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crea cura</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-10 text-center">
                <h2>CREAR CURA A: <br> {{ $residente->nombre . ' ' . $residente->apellidos }} </h2>
            </div>
        </div>
    @endisset
    <!-- Solo puede modificar la hora y la fecha-->
    <!--Si la cura esta creada ya se muestra este formulario de actualización-->
    <div class="row justify-content-center">
        <div class="col-md-6">
            @isset($cura->id)
                <form action="{{ route('actualizar.cura', ['id' => $cura->id]) }}" method="POST">
                    @method('put')
                @else
                    <form action="{{ route('almacenar.cura') }}" method="POST">
                    @endisset
                    @csrf
                    @isset($cura)
                        <div class="mb-3">
                            <label for="id" class="form-label">ID:</label>
                            <input type="text" class="form-control" id="id" name="id"
                                value="{{ $cura->id ?? '' }}" @isset($cura) readonly @endisset>
                        </div>
                    @endisset

                    <div class="mb-3">
                        <label for="enfermero" class="form-label">Enfermero/a:</label>
                        <input type="text" class="form-control" id="enfermero" name="nombre"
                            value="{{ auth()->user()->empleado->nombre }} {{ auth()->user()->empleado->apellidos }} "
                            disabled>
                        <input type="text" name="empleado_id" id="" hidden
                            value="{{ auth()->user()->empleado->id }}">
                    </div>
                    <div class="mb-3">
                        <label for="zona" class="form-label">Zona</label>
                        <input type="text" class="form-control" id="zona" name="zona"
                            value="{{ old('zona', $cura->zona ?? '') }}" requiredy
                            @isset($cura->id)
                                disabled
                            @endisset>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" required
                            value="{{ old('estado', $cura->estado ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required
                            value="{{ old('fecha', $cura->fecha ?? '') }}">
                        <x-input-error :messages="$errors->get('fecha')" class="mt-2" />

                    </div>
                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora:</label>
                        <input type="time" class="form-control" id="hora" name="hora" required
                            value="{{ old('hora', $cura->hora ?? '') }}">
                    </div>
                    <br>
                    <input type="text" hidden name="residente_id" value="{{ $residente->id }}">


                    @isset($cura)
                        <!--Si está establecida la cura mostrar modificar, si no crear-->
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('¿Estás seguro de que deseas modificar esta cura?')">MODIFICAR</button>
                        <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia, por lo que no se borra-->
                    @else
                        <button type="submit" class="btn btn-success">CREAR</button>
                    @endisset
                </form>

        </div>
    </div>

    @isset($cura->id)
        <div class="row justify-content-center">
            <div class="col-2 text-center">
                <form action="{{ route('borrar.cura', $cura->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta cura?')">BORRAR</button>
                    <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia-->
                </form>
            </div>
        </div>
    @endisset

@endsection
