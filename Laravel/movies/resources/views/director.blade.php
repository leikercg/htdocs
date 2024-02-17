@extends('master')

@section('Cartelera', 'Peliculas')

@section('main_title', 'BUSQUEDA POR DIRECTOR: ' . $busqueda)

@section('content')
    <div id='peliculas'>

        @php $contador=1; @endphp
        <table>
            @foreach ($movies as $movie)
                <!--divide el array movies e segmentos de 3 -->

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
