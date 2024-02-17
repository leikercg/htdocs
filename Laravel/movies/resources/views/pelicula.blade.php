@extends('master')

@section('Cartelera', $title)

@section('main_title', $title)

@section('content')
    <div id='pelicula'>

        <div><img src="{{ asset('images/' . $image) }}"></div>
            <div id="datos">
                <p><b>Director:</b>{{ $director->name }} {{ $director->surname }}</p>
                <p><b>Actor principal:</b>{{ $leadActor->name }} {{ $leadActor->surname }}</p>
                @php $contador=1 @endphp
                @foreach ($writers as $writer)
                    @if ($contador == 1)
                        <p ><b>Guionistas:</b>{{ $writer->name }} {{ $writer->surname }}</p>
                        @php $contador++ @endphp
                    @else
                        <p class="writer">{{ $writer->name }} {{ $writer->surname }}</p>
                    @endif
                @endforeach

                <p><b>Fecha de estreno:</b>{{ $release_date }}</p>
                <p><b>Duración:</b>{{ $duration }}</p>
                <p><b>Género:</b>{{ $genre }}</p>
            </div>



    </div>
    <div id="synopsis">
        <p><b>Synopsis:</b></p><p>{{ $synopsis }}</p>
    </div>
@endsection
