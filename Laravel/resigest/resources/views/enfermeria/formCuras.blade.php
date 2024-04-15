@extends('master')
@section('title', 'Crear cura para ' . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
    @isset($vista->id)
        <div class="row">
            <div class="col-12 text-center">
                <h2>MODIFICAR CURA A: {{ $residente->nombre . ' ' . $residente->apellidos }} </h2>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-10 text-center">
                <h2>CREAR CURA A: {{ $residente->nombre . ' ' . $residente->apellidos }} </h2>
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
                        <input type="text" class="form-control" id="zona" name="zona" value="{{ $cura->zona ?? '' }}"
                            @isset($cura->id)
                                disabled
                            @endisset >
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" value="{{ $cura->estado ?? '' }}" i
                        >
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha"
                            value="{{ $cura->Fecha ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora:</label>
                        <input type="time" class="form-control" id="hora" name="hora"
                            value="{{ $cura->hora ?? '' }}">
                    </div>
                    <br>
                    <input type="text" hidden name="residente_id" value="{{ $residente->id }}">


                    <button type="submit" class="btn btn-primary">Enviar</button>
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
