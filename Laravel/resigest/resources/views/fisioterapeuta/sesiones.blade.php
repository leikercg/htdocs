@extends('master')
@section('title', __('Sesiones de ') . $residente->nombre . ' ' . $residente->apellidos)
@section('content')
<div class="row">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('lista.residentes') }}">{{ __('Lista de residentes') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ficha.residente', $residente->id) }}">{{ $residente->nombre }} {{ $residente->apellidos }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Sesiones') }}</li>
        </ol>
    </nav>
</div>
@php
//creamos una varibale con la fecha del dia de hoy
$hoy = now()->format('Y-m-d');
@endphp
   <div>{{$hoy}}</div>
    <div class="row justify-content-center">
        <div class="col-4 col-md-2 text-center">
            <a href="{{ route('crear.sesion', ['residente_id' => $residente->id]) }}" class="btn btn-success">{{ __('AÑADIR SESIÓN') }}</a>
        </div>
    </div><br>
    <div class="row justify-content-center text-center">
        <div class="col">
            <h2>{{ __('SESIONES DE: ') }} {{ $residente->nombre }} {{ $residente->apellidos }}</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 col-12">
            <div class="table-responsive">{{-- para desplazamiento lateral en caso de desbordamiento de pantallas --}}
                <table class="table table-hover text-center align-middle">
                <thead>
                    <tr>
                        <th scope="col">{{ __('ID') }}</th>
                        <th scope="col">{{ __('Fecha') }}</th>
                        <th scope="col">{{ __('Hora') }}</th>
                        <th scope="col">{{ __('Fisio') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sesiones as $sesion)
                    <tr @if ($sesion->fecha==$hoy)   class="table-success"  @endif>
                        <td>{{ $sesion->id }}</td>
                            <td>{{ date('d/m/Y', strtotime($sesion->fecha)) }} </td><!--formato de la fecha-->
                            <td>{{ $sesion->hora }}</td>
                            <td>{{ $sesion->empleado->nombre }} {{ $sesion->empleado->apellidos }}</td>
                            <td><!--Si el empleado es el que creo la sesion y la fecha aun no ha llegado se podra modificar -->
                                @if (auth()->user()->empleado->id == $sesion->empleado_id && $sesion->fecha >= $hoy)
                                    <a href="{{ route('editar.sesion', ['id' => $sesion->id, 'residente_id' => $residente->id]) }}"
                                        class="btn btn-primary">{{ __('Modificar') }}</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

@endsection
