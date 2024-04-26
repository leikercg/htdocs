@extends('master')
@section('title', $residente->nombre . ' ' . $residente->apellidos)

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h3>Seguimiento de {{ $residente->nombre }} {{ $residente->apellidos }} en
                {{ $seguimiento->departamento->nombre }}
            </h3>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="{{ route('actualizar.seguimiento', ['id' => $seguimiento->id]) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Seguimiento:</label>
                    <textarea id="textarea" class="form-control" rows="15" disabled>{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}{{ $seguimiento->seguimiento }}</textarea>
                </div>

                @if ($seguimiento->departamento_id == auth()->user()->departamento_id)
                    <textarea class="form-control" name="seguimiento" rows="3" placeholder="Añada nuevo seguimiento... " autofocus></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary"
                        onclick="return confirm('¿Estás seguro de que deseas modificar esta seguimiento?')">Añadir</button>
                @endif

            </form>
        </div>

    </div>

    <div class="row justify-content-center">
        <div class="col-1">
            <a class="btn btn-primary" href="{{ route('ficha.residente', $residente->id) }}">Volver</a>
        </div>
    </div>

    <script>
        var textarea = document.getElementById("textarea"); //asignamos el textarea


        textarea.scrollTop = textarea.scrollHeight - textarea
        .clientHeight; //definimos la cantidad de scroll, le restamos la altura de la pantalla ya que siempre será mayor, asi nos muestra la última linea
    </script>


@endsection
