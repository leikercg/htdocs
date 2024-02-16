@extends('master')

@section('Cartelera',$movie->title)

@section('main_title', $movie->title)

@section('content')
    <div id='pelicula'>
       <div><img src="{{ asset('images/' . $movie->image)}}"></div>
       <div id="datos">
        <p><b>Director:</b>{{$movie->director_id}}</p>
        <p><b>Actor principal:</b>{{$movie->lead_actor_id}}</p>
        <p><b>Guionistas:</b></p>
        <p><b>Fecha de estreno:</b>{{$movie->release_date}}</p>
        <p><b>Duración:</b>{{$movie->director_id}}</p>
        <p><b>Género:</b>{{$movie->genre_id}}</p>
        <div id="synopsis">
            {{$movie->synopsis}}
        </div>
       </div>




        </table>
    </div>
@endsection
