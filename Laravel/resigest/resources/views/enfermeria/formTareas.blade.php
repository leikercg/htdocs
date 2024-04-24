@extends('master')
@section('title', 'Tareas de ' . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
    @php
        $iterador = 1;
    @endphp
    @isset($tarea->id)
        <div class="row">
            <div class="col-12 text-center">
                <h2>MODIFICAR TAREA A: <br> {{ $residente->nombre . ' ' . $residente->apellidos }} </h2>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-10 text-center">
                <h2>CREAR TAREA A: <br> {{ $residente->nombre . ' ' . $residente->apellidos }} </h2>
            </div>
        </div>
    @endisset
    <!-- Solo puede modificar la hora, la fecha, auxiliar y descripción-->
    <!--Si la tarea esta creada ya se muestra este formulario de actualización-->
    <div class="row justify-content-center">
        <div class="col-md-6">
            @isset($tarea->id)
                <form action="{{ route('actualizar.tarea', ['id' => $tarea->id]) }}" method="POST">
                    @method('put')
                @else
                    <form action="{{ route('almacenar.tarea') }}" method="POST">
                    @endisset
                    @csrf
                    @isset($tarea)
                        <div class="mb-3">
                            <label for="id" class="form-label">ID:</label>
                            <input type="text" class="form-control" id="id" name="id"
                                value="{{ $tarea->id ?? '' }}" @isset($tarea) readonly @endisset>
                        </div>
                    @endisset
                    <div class="mb-3">
                        <label for="enfermero" class="form-label">Enfermero/a:</label>
                        <input type="text" class="form-control" id="enfermero" name="nombre"
                            value="{{ auth()->user()->empleado->nombre }} {{ auth()->user()->empleado->apellidos }} "
                            disabled>
                        <input type="text" name="empleado_id" id="" hidden
                            value="{{ auth()->user()->empleado->id }}"><!--Enviamos el id del residente oculto para los usuarios-->
                    </div>
                    <div class="mb-3">
                        @foreach ($auxiliares as $auxiliar)
                            <input type="radio" class="form-check-input" id="auxiliar{{ $iterador }}"
                                name="auxiliar_id" value="{{ $auxiliar->id }}"
                                @if (isset($tarea->auxiliar_id) && $auxiliar->id == $tarea->auxiliar_id) checked @endif>
                            <label for="auxiliar{{ $iterador }}" class="form-check-label">
                                {{ $auxiliar->nombre }} {{ $auxiliar->apellidos }}
                            </label>
                            @php
                                $iterador++;
                            @endphp

                            <br>

                        @endforeach
                        <x-input-error :messages="$errors->get('auxiliar_id')" class="mt-2" />

                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required
                            value="{{old('descripcion', $tarea->descripcion ?? '' )}}">
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required
                            value="{{ old('fecha', $tarea->fecha ?? '' )}}">
                    </div>
                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora:</label>
                        <input type="time" class="form-control" id="hora" name="hora" required
                            value="{{ old('hora', $tarea->hora ?? '' )}}">
                    </div>
                    <br>
                    <input type="text" hidden name="residente_id" value="{{ $residente->id }}">


                    @isset($tarea)
                        <!--Si está establecida la tarea mostrar modificar, si no crear-->
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('¿Estás seguro de que deseas modificar esta tarea?')">MODIFICAR</button>
                        <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia, por lo que no se borra-->
                    @else
                        <button type="submit" class="btn btn-success">CREAR</button>
                    @endisset
                </form>

        </div>
    </div>

    @isset($tarea->id)
        <div class="row justify-content-center">
            <div class="col-2 text-center">
                <form action="{{ route('borrar.tarea', [$tarea->id, 'residente_id' => $residente->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">BORRAR</button>
                    <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia-->
                </form>
            </div>
        </div>
    @endisset

@endsection
