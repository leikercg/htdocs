@extends('master')
@section('title', $residente->Nombre . ' ' . $residente->Apellidos)

@section('content')

    <div class="mb-3">
      <h3>Seguimiento de {{$residente->Nombre}} {{$residente->Apellidos}} en {{$seguimiento->departamento->nombre}}</h3>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Seguimiento:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{$seguimiento->Seguimiento}}</textarea>
    </div>

@endsection
