@extends('master')
@section('title', 'Crear sesión para ' . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
    @isset($vista->id)
        <div class="row">
            <div class="col-12 text-center">
                <h2>MODIFICAR SESIÓN A: {{ $residente->nombre . ' ' . $residente->apellidos }} </h2>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-10 text-center">
                <h2>CREAR SESIÓN A: {{ $residente->nombre . ' ' . $residente->apellidos }} </h2>
            </div>
        </div>
    @endisset
    <!-- Solo puede modificar la hora y la fecha-->
    <!--Si la sesión esta creada ya se muestra este formulario de actualización-->
    <div class="row justify-content-center">
        <div class="col-md-6">
            @isset($sesion->id)
                <form action="{{ route('actualizar.sesion', ['id' => $sesion->id]) }}" method="POST">
                    @method('put')
                @else
                    <form action="{{ route('almacenar.sesion') }}" method="POST">
                    @endisset
                    @csrf
                    @isset($sesion)
                        <div class="mb-3">
                            <label for="id" class="form-label">ID:</label>
                            <input type="text" class="form-control" id="id" name="id"
                                value="{{ $sesion->id ?? '' }}" @isset($sesion) readonly @endisset>
                        </div>
                    @endisset

                    <div class="mb-3">
                        <label for="fisio" class="form-label">Fisio:</label>
                        <input type="text" class="form-control" id="fisio" name="nombre"
                            value="{{ auth()->user()->empleado->nombre }} {{ auth()->user()->empleado->apellidos }} "
                            disabled>
                        <input type="text" name="empleado_id" id="" hidden
                            value="{{ auth()->user()->empleado->id }}">
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required
                            value="{{ $sesion->fecha ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora:</label>
                        <input type="time" class="form-control" id="hora" name="hora" required
                            value="{{ $sesion->hora ?? '' }}">
                    </div>
                    <br>
                    <input type="text" hidden name="residente_id" value="{{ $residente->id }}">


                    @isset($sesion)
                        <!--Si  establecida la sesión mostrar modificar, si no crear-->
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('¿Estás seguro de que deseas modificar esta sesión ?')">MODIFICAR</button>
                        <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia, por lo que no se borra-->
                    @else
                        <button type="submit" class="btn btn-success">CREAR</button>
                    @endisset
                </form>
        </div>
    </div>

    @isset($sesion->id)
        <div class="row justify-content-center">
            <div class="col-2 text-center">
                <form action="{{ route('borrar.sesion', $sesion->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta sesion?')">BORRAR</button>
                    <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia-->
                </form>
            </div>
        </div>
    @endisset

@endsection
