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

        <div class='row justify-content-end my-4'>
            <div class="col-5 d-flex flex-column align-items-center">
                <form method="POST" action="{{ route('logout') }}"> <!--ruta para cerrar sesión-->
                    @csrf
                    <button type="submit" class="btn btn-secondary">Cerrar sesión</button>
                </form>
            </div>
        </div>
        <!--empleados-->
        @if (auth()->user()->departamento_id > 0 && auth()->user()->departamento_id < 6)
            <div class='row justify-content-end'>
                <div class="col-5 d-flex flex-column align-items-center">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->empleado->nombre }}+{{ auth()->user()->empleado->apellidos }}&background=random&font-size=0.33&rounded=true"
                        alt="avatar">
                    <h5 class="text-center">Área de {{ auth()->user()->empleado->departamento->nombre }}</h5>
                </div>
            </div>


            <!--familiares-->
        @elseif(auth()->user()->departamento_id == 6)
            <div class='row justify-content-end'>
                <div class="col-5 d-flex flex-column align-items-center">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->familiar->nombre }}+{{ auth()->user()->familiar->apellidos }}&background=random&font-size=0.33&rounded=true"
                        alt="avatar">
                    <h5 class="text-center">Área de {{ auth()->user()->familiar->departamento->nombre }}</h5>
                </div>
            </div>
        @else
            <!--ADMIN-->
            <div class='row justify-content-end'>

                <div class="col-5 d-flex flex-column align-items-center">
                    <img src="https://ui-avatars.com/api/?name=ADMIN&background=random&font-size=0.33&rounded=true"
                        alt="avatar">
                    <h5 class="text-center">Área de Administración</h5>
                </div>
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
                            <a class="btn btn-outline-dark" href="{{route('lista.grupos')}}" role="button">Ver Grupos</a>
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
                            <a class="btn btn-outline-dark" href="{{route('auxiliar.tareas',['id'=>auth()->user()->empleado->id])}}" role="button">Ver Tareas</a>
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
                            <a class="btn btn-outline-dark" href='{{ route('lista.residentes') }}'
                                role="button">Gestional
                                Residentes</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href="{{ route('familiar_empleado') }}"
                                role="button">Gestional Usuarios</a>
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
    <footer>
        <div class='row justify-content-center p-4'>
            <div class="col d-flex flex-column align-items-center">
                <!--Empleados-->
                @if (auth()->user()->departamento_id > 0 && auth()->user()->departamento_id < 6)
                    <div class="col-5 d-flex flex-column align-items-center">
                        <p>Ha iniciado sesión como <b>{{ auth()->user()->empleado->nombre }}
                                {{ auth()->user()->empleado->apellidos }}</b></p>
                    </div>


                    <!--familiares-->
                @elseif(auth()->user()->departamento_id == 6)
                    <div class="col-5 d-flex flex-column align-items-center">
                        <p>Ha iniciado sesión como <b>{{ auth()->user()->familiar->nombre }}
                                {{ auth()->user()->familiar->apellidos }}</b></p>
                    </div>
                @else
                    <!--ADMIN-->
                    <div class="col-5 d-flex flex-column align-items-center">
                        <p>Ha iniciado sesión como <b>ADMINISTRADOR</b></p>
                    </div>
                @endif

            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
