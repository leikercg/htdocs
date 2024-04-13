@extends('master')
@section('title', $residente->nombre . ' ' . $residente->apellidos)

@section('content')

    <div class="mb-3">
      <h3>Seguimiento de {{$residente->nombre}} {{$residente->apellidos}} en {{$seguimiento->departamento->nombre}}</h3>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Seguimiento:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{$seguimiento->seguimiento}}</textarea>
    </div>

@endsection
