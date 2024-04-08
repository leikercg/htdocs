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
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Cerrar sesión</button>
            </form>
        </div>
        <div id='user' class='row justify-content-end'>
            <div class="col-4">{{ auth()->user()->familiar->Nombre }} {{ auth()->user()->familiar->Apellidos }}</div>
        </div>
        <div id='user' class='row justify-content-end'>
            <div class="col-4">Área de {{ auth()->user()->familiar->departamento->nombre }}</div>
        </div>

        @if (auth()->user()->id_departamento == 3)
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
@else
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
                            <a class="btn btn-outline-dark" href="#" role="button">Gestional
                                Residentes</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="btn btn-outline-dark" href="#" role="button">Gestional Usuarios</a>
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
