{{--Plantilla para imprimir la lista de tareas de una auxiliar--}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Tareas auxiliar</title>
    <style>
        /* Estilo personalizado para agregar espacios entre las columnas */
        th,
        td {
            padding-left: 30px; /* Ajusta el espacio de relleno según sea necesario */
        }
    </style>
</head>

<body>
    @php
        //creamos una varibale con la fecha del dia de hoy
        $hoy = now()->format('d-m-Y');
    @endphp
    <div>{{ __('Fecha') }}: {{ $hoy }}</div>
    <div class="row justify-content-center text-center">
        <h2>{{ __('TAREAS A REALIZAR HOY POR') }}: <br> {{ $auxiliar->nombre }} {{ $auxiliar->apellidos }}</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 col-12">
            <div class="table-responsive">{{-- para desplazamiento lateral en caso de desbordamiento de pantallas --}}
                <table class="table table-hover text-center align-middle">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Hora') }}</th>
                            <th scope="col">{{ __('Enfermero/a') }}</th>
                            <th scope="col">{{ __('Residente') }}</th>
                            <th scope="col">{{ __('Descripción') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tareas as $tarea)
                            <tr>
                                <td>{{ $tarea->hora }}</td>
                                <td>{{ $tarea->empleado->nombre }} {{ $tarea->empleado->apellidos }}</td>
                                <td>{{ $tarea->residente->nombre }} {{ $tarea->residente->apellidos }}</td>
                                <td>{{ $tarea->descripcion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
