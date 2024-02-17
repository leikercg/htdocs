@extends('master')

@section('Cartelera', $genero)

@section('main_title', 'CATALOGO DE PELICULAS DE '. $genero)

@section('content')
    <div id='peliculas'>
        <table>
            @foreach ($movies->chunk(3) as $chunk)
            <tr>
                @foreach ($chunk as $movie)
                <td> <a href="{{route('pelicula', ['id'=>$movie->id])}}"><img class="portada" src="{{asset('images/'.$movie->image)}}"></a></td>
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
@endsection
