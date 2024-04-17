@extends('master')
@section('title', 'Crear visita para ' . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
    @isset($vista->id)
        <div class="row">
            <div class="col-12 text-center">
                <h2>MODIFICAR VISITA A: {{ $residente->nombre . ' ' . $residente->apellidos }} </h2>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-10 text-center">
                <h2>CREAR VISITA A: {{ $residente->nombre . ' ' . $residente->apellidos }} </h2>
            </div>
        </div>
    @endisset
    <!-- Solo puede modificar la hora y la fecha-->
    <!--Si la visita esta creada ya se muestra este formulario de actualización-->
    <div class="row justify-content-center">
        <div class="col-md-6">
            @isset($visita->id)
                <form action="{{ route('actualizar.visita', ['id' => $visita->id]) }}" method="POST">
                    @method('put')
                @else
                    <form action="{{ route('almacenar.visita') }}" method="POST">
                    @endisset
                    @csrf
                    @isset($visita)
                        <div class="mb-3">
                            <label for="id" class="form-label">ID:</label>
                            <input type="text" class="form-control" id="id" name="id"
                                value="{{ $visita->id ?? '' }}" @isset($visita) readonly @endisset>
                        </div>
                    @endisset

                    <div class="mb-3">
                        <label for="medico" class="form-label">Médico:</label>
                        <input type="text" class="form-control" id="medico" name="nombre"
                            value="{{ auth()->user()->empleado->nombre }} {{ auth()->user()->empleado->apellidos }} "
                            disabled>
                        <input type="text" name="empleado_id" id="" hidden
                            value="{{ auth()->user()->empleado->id }}">
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha"
                        required value="{{ $visita->fecha ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora:</label>
                        <input type="time" class="form-control" id="hora" name="hora" required
                            value="{{ $visita->hora ?? '' }}">
                    </div>
                    <br>
                    <input type="text" hidden name="residente_id" value="{{ $residente->id }}">


                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
        </div>
    </div>

    @isset($visita->id)
        <div class="row justify-content-center">
            <div class="col-2 text-center">
                <form action="{{ route('borrar.visita', $visita->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta visita?')">BORRAR</button>
                    <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia-->
                </form>
            </div>
        </div>
    @endisset

@endsection
