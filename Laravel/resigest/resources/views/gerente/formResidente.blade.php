@extends('master')
@section('title', 'Gestionar Residente')
@section('content')


    <br><br>
    @isset($residente)
        <div class="row">
            <div class="col-12 text-center">
                <h2>MODIFICAR RESIDENTE</h2>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-10 text-center">
                <h2>CREAR RESIDENTE</h2>
            </div>
        </div>
    @endisset
    <!-- Solo puede modifica la habitación y el estado-->
    <div class="row justify-content-center">
        <div class="col-md-6">
            @isset($residente)
                <form action="{{ route('actualizar.residente', ['id' => $residente->id]) }}" method="POST">
                    @method('put')
                @else
                    <form action="{{ route('almacenar.residente') }}" method="POST">
                    @endisset
                    @csrf
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI:</label>
                        <input type="text" class="form-control" id="dni" name="dni"
                            value="{{ $residente->dni ?? '' }}" @isset($residente) readonly @endisset>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $residente->nombre ?? '' }}" @isset($residente) readonly @endisset>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos"
                            value="{{ $residente->apellidos ?? '' }}"
                            @isset($residente) readonly @endisset>
                    </div>
                    <div class="mb-3">
                        <label for="habitacion" class="form-label">Habitación:</label>
                        <input type="number" class="form-control" id="habitacion" name="habitacion"
                            value="{{ $residente->habitacion ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado:</label>
                        <select class="form-select" id="estado" name="estado">
                            <option value="alta">Alta</option>
                            @isset($residente)
                                <option value="baja" @if ($residente->estado == 'baja') selected @endif>
                                    Baja</option>
                            @endisset
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nac" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac"
                            value="{{ $residente->fecha_nac ?? '' }}"
                            @isset($residente) readonly @endisset>
                    </div><br>


                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
        </div>
    </div>


@endsection
