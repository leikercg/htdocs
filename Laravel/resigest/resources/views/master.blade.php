<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <header class="container-fluid d-flex flex-column justify-content-center"><!--Ocupar todo el ancho disponible-->

        <div id='user' class='row justify-content-end'>
            <div class="col-3">
                <a href="{{ route('logout')}}" class="btn btn-secondary">Cerrar sesión</a>
            </div>
        </div>
        <br>
        <!--empleados-->
        @if (auth()->user()->departamento_id > 0 && auth()->user()->departamento_id < 6)
            <div id='user' class='row justify-content-end'>
                <div class="col-4">{{ auth()->user()->empleado->nombre }} {{ auth()->user()->empleado->apellidos }}
                </div>
                <div id='user' class='row justify-content-end'>
                    <div class="col-4">Área de {{ auth()->user()->empleado->departamento->nombre }}</div>
                </div>
            </div>

        <!--familiares-->
        @elseif(auth()->user()->departamento_id == 6)
            <div id='user' class='row justify-content-end'>
                <div class="col-4">{{ auth()->user()->familiar->nombre }} {{ auth()->user()->familiar->apellidos }}
                </div>
                <div id='user' class='row justify-content-end'>
                    <div class="col-4">Área de {{ auth()->user()->familiar->departamento->nombre }}</div>
                </div>
            </div>
        @else
        <!--ADMIN-->
            <div id='user' class='row justify-content-end'>
                <div class="col-4">ADMIN</div>
            </div>
            <div id='user' class='row justify-content-end'>
                <div class="col-4">Área de Administración</div>
            </div>
        @endif

        <!-- En caso de ser medico, enfermero o fisio mostrar esto-->
        @if (auth()->user()->departamento_id == 3 ||
                auth()->user()->departamento_id == 2 ||
                auth()->user()->departamento_id == 1)
            <div class="container"><!--Ocupar 12 columans y centrar-->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <!--Ocupar todo el ancho disponible //////////////////////////////////////// Botones-->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
                                <li class="nav-item mx-1">
                                    <a class="btn btn-outline-dark" href='{{ route('lista.residentes') }}'
                                        role="button">Lista de Residentes</a>
                                </li>
                                <li class="nav-item mx-1">
                                    <a class="btn btn-outline-dark" href="#" role="button">Agenda</a>
                                </li>
                                <li class="nav-item mx-1">
                                    <a class="btn btn-outline-dark" href="#" role="button">Área Personal</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
    </header>

    <!-- En caso de ser terapeuta-->
@elseif(auth()->user()->departamento_id == 4)
    <div class="container"><!--Ocupar 12 columans y centrar-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <!--Ocupar todo el ancho disponible //////////////////////////////////////// Botones-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href='{{ route('lista.residentes') }}' role="button">Lista
                                de Residentes</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href="#" role="button">Agenda</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href="#" role="button">Área Personal</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href="#" role="button">Crear Grupo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    </header>

    <!-- En caso de ser auxiliar-->
@elseif(auth()->user()->departamento_id == 5)
    <div class="container"><!--Ocupar 12 columans y centrar-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <!--Ocupar todo el ancho disponible //////////////////////////////////////// Botones-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href='{{ route('lista.residentes') }}'
                                role="button">Lista
                                de Residentes</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href="#" role="button">Agenda</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href="#" role="button">Área Personal</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href="#" role="button">Ver Tareas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    </header>
    <!-- En caso de ser familiar-->
@elseif(auth()->user()->departamento_id == 6)
    <div class="container"><!--Ocupar 12 columans y centrar-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <!--Ocupar todo el ancho disponible //////////////////////////////////////// Botones-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href='{{ route('lista.residentes') }}'
                                role="button">Lista
                                de Residentes</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href="#" role="button">Área Personal</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    </header>

    <!-- En caso de ser gerencia-->
@elseif(auth()->user()->departamento_id == 7)
    <div class="container"><!--Ocupar 12 columans y centrar-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <!--Ocupar todo el ancho disponible //////////////////////////////////////// Botones-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href="#" role="button">Área Personal</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href='{{ route('lista.residentes') }}' role="button">Gestional
                                Residentes</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href="{{ route('familiar_empleado') }}" role="button">Gestional Usuarios</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    </header>
    @endif

    <main class="container py-4">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
