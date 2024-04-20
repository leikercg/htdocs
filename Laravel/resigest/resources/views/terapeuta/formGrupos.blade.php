@extends('master')
@section('title', 'Crear Usuario')
@section('content')
    @php
        $iterador = 1;
    @endphp

    @isset($grupo)
        <!-- SI ESTA ESTABLECIDO EL el grupo MOSTRAR EL FORMULUARIO DE EDICIÓN, SI NO MOSTRAR EL DE CREACIÓN-->
        <!-- Solo se puede modificar el dia, la hora  y los participantes-->

        <br><br>
        <div class="row">
            <div class="col-12 text-center">
                <h2>MODIFICAR GRUPO</h2>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('actualizar.grupo', ['id' => $grupo->id]) }}" method="POST">
                    @method('put')
                    @csrf
                    <div>
                        <label for="id">ID</label>
                        <input id="id" class="block mt-1 w-full form-control" type="text" name="id" readonly
                            value="{{ $grupo->id }}" required>
                    </div>
                    <br>
                    <div>
                        <label for="fecha">Fecha</label>
                        <input id="fecha" class="block mt-1 w-full form-control" type="date" name="fecha"
                        value="{{ old('fecha', $grupo->fecha ?? '') }}" required autofocus>
                        <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <label for="hora">Hora</label>
                        <input id="hora" class="block mt-1 w-full form-control" type="time" name="hora"
                            value="{{ old('hora', $grupo->hora ?? '') }}" required>
                    </div>
                    <div class="mt-4">
                        <label for="empleado">Fisio</label>
                        <input id="empleado" class="block mt-1 w-full form-control" type="text" name="empleado_id"
                            value="{{ $grupo->empleado->nombre }} {{ $grupo->empleado->apellidos }}" required readonly>
                    </div>
                    <div class="mt-4">
                        <label for="descripcion">Descripción</label>
                        <input id="descripcion" class="block mt-1 w-full form-control" type="text" name="descripcion"
                            value="{{ old('descipcion', $grupo->descripcion )}}" required>
                    </div>
                    <div class="mt-4">
                        <label>Participantes</label><br>
                        @forelse ($residentes as $residente)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="residentes[]"
                                    id="residente{{ $iterador }}" value="{{ $residente->id }}"
                                    {{ $grupo->residentes->contains($residente) ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="residente{{ $iterador }}"><!--Para que se marque pulsado el nombre-->
                                    {{ $residente->nombre }} {{ $residente->apellidos }}
                                    @php
                                        $iterador++;
                                    @endphp
                                </label>
                            </div>
                        @empty
                            <p>Sin participantes</p>
                        @endforelse
                        <x-input-error :messages="$errors->get('residentes')" class="mt-2" />
                    </div><br>
                    <button type="submit" class="btn btn-primary"
                        onclick="return confirm('¿Estás seguro de que deseas modificar este grupo?')">MODIFICAR</button>
                </form>
            </div>
        </div>

        <!-- Borrar grupo -->
        <div class="row justify-content-center">
            <div class="col-2 text-center">
                <form action="{{ route('borrar.grupo', ['id' => $grupo->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este grupo?')">BORRAR</button>
                    <!--si no devuelve true nos sigue el comportamiento por defecto, es decir no se envia-->
                </form>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('almacenar.grupo') }}">
                    @csrf
                    <div>
                        <label for="fecha">Fecha</label>
                        <input id="fecha" class="block mt-1 w-full form-control" type="date" name="fecha" required value="{{old('fecha')}}"
                            autofocus>
                        <x-input-error :messages="$errors->get('fecha')" class="mt-2" />

                    </div>
                    <div class="mt-4">
                        <label for="hora">Hora</label>
                        <input id="hora" class="block mt-1 w-full form-control" type="time" name="hora" required value="{{old('hora')}}">
                    </div>
                    <div class="mt-4">
                        <label for="empleado">Fisio</label>
                        <input id="empleado" class="block mt-1 w-full form-control" type="text" name="empleado_id"
                            value="{{ auth()->user()->empleado->nombre }} {{ auth()->user()->empleado->apellidos }}" readonly>
                        <input type="text" name="empleado_id" value="{{ auth()->user()->empleado->id }}" hidden>
                    </div>
                    <div class="mt-4">
                        <label for="descripcion">Descripción</label>
                        <input id="descripcion" class="block mt-1 w-full form-control" type="text" name="descripcion"
                           value="{{old('descripcion')}}" required>
                    </div>
                    <div class="mt-4">
                        <label>Participantes</label><br>
                        @forelse ($residentes as $residente)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="residentes[]"
                                    id="residente{{ $iterador }}" value="{{ $residente->id }}">
                                <label class="form-check-label"
                                    for="residente{{ $iterador }}"><!--Para que se marque pulsado el nombre-->
                                    {{ $residente->nombre }} {{ $residente->apellidos }}
                                </label>
                            </div>
                            @php
                                $iterador++;
                            @endphp
                        @empty
                            Sin participantes
                        @endforelse
                        <x-input-error :messages="$errors->get('residentes')" class="mt-2" />
                    </div>

                    <br>
                    <button type="submit" class="btn btn-success">CREAR</button>
                </form>
            </div>
        </div>

    @endisset
@endsection
