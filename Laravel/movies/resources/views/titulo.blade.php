@extends('master')

@section('Cartelera', 'Peliculas')

@section('main_title', 'BUSQUEDA POR TITULO: '.$busqueda)

@section('content')
    <div id='peliculas'>
        <table>
            @foreach ($movies->chunk(3) as $chunk)
                <!--divide el array movies e segmentos de 3, solo funcinona con colecciones de Laravel-->
                <tr>
                    @foreach ($chunk as $movie)
                        <td><a href="{{ route('pelicula',$movie->id) }}"><img class="portada" src="{{ asset('images/' . $movie->image) }}" alt="Portada de la película"></a>
                        </td>
                    @endforeach
                </tr>
            @endforeach

        </table>
    </div>
@endsection
