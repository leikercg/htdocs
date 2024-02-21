@extends('master')

@section('Cartelera', 'Peliculas')

@section('main_title', 'BUSQUEDA POR DIRECTOR: ' . $busqueda)

@section('content')
    <div id='peliculas'>
<!--recibimos dos parámetros, busqueda que es lo escrito en el form y un array php-->
        @php $contador=1; @endphp
        <table>
            @foreach ($movies as $movie)

                @if ($contador  == 1)
                    <tr>
                @endif

                <td><a href="{{ route('pelicula', $movie->id) }}"><img class="portada"
                            src="{{ asset('images/' . $movie->image) }}" alt="Portada de la película"></a>
                </td>
                @if ($contador == 3)
                    </tr>
                    @php $contador=0; @endphp
                @endif
                @php $contador++; @endphp
            @endforeach

        </table>


    </div>
@endsection
