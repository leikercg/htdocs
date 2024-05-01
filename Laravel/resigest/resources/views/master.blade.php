<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('Home'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div class="floating-button" onclick="scrollArriba()">
        <i class="material-icons">arrow_upward</i><!--Icono de flecha-->
    </div>
    <header class="container-fluid d-flex flex-column justify-content-center position-sticky top-0">

        <div class="row justify-content-around">
            <a class="idioma " href="{{route('idiom',['locale'=>'en'])}}">English</a>
            <a class="idioma " href="{{route('idiom',['locale'=>'es'])}}">Español</a>
        </div>
        {{-- Logo --}}
        <div class='row justify-content-between mt-1 mb-1'>
            <div class="col-2 d-flex offset-1 flex-column align-items-center">
                <img src="{{ asset('images/logo-FRA.png') }}" class="img-fluid d-md-block d-none" alt="{{ __('Logo de Fundación Rey Ardid') }}" />
            </div>
            {{-- Avatar --}}
            <div class="col-5 d-flex flex-column align-items-center">
                <form method="POST" action="{{ route('logout') }}"> <!--ruta para cerrar sesión-->
                    @csrf
                    <button type="submit" class="btn btn-secondary">{{ __('Cerrar sesión') }}</button>
                </form>
            </div>
        </div>
        <!--empleados-->
        @if (auth()->user()->departamento_id > 0 && auth()->user()->departamento_id < 6)
            <div class='row justify-content-end'>
                <div class="col-5 d-flex flex-column align-items-center">
                    <a href="{{ route('profile.edit') }}"><img
                            src="https://ui-avatars.com/api/?name={{ auth()->user()->empleado->nombre }}+{{ auth()->user()->empleado->apellidos }}&background=random&font-size=0.33&rounded=true"
                            alt="{{ __('avatar') }}"></a>
                    <h5 class="text-center">{{ __('Área de') }} {{ auth()->user()->empleado->departamento->nombre }}</h5>
                </div>
            </div>


            <!--familiares-->
        @elseif(auth()->user()->departamento_id == 6)
            <div class='row justify-content-end'>
                <div class="col-5 d-flex flex-column align-items-center">
                    <a href="{{ route('profile.edit') }}"><img
                            src="https://ui-avatars.com/api/?name={{ auth()->user()->familiar->nombre }}+{{ auth()->user()->familiar->apellidos }}&background=random&font-size=0.33&rounded=true"
                            alt="{{ __('avatar') }}"></a>
                    <h5 class="text-center">{{ __('Área de') }} {{ auth()->user()->familiar->departamento->nombre }}</h5>
                </div>
            </div>
        @else
            <!--ADMIN-->
            <div class='row justify-content-end'>

                <div class="col-5 d-flex flex-column align-items-center">
                    <a href="{{ route('profile.edit') }}"> <img
                            src="https://ui-avatars.com/api/?name=ADMIN&background=random&font-size=0.33&rounded=true"
                            alt="{{ __('avatar') }}"></a>
                    <h5 class="text-center">{{ __('Área de Administración') }}</h5>
                </div>
            </div>
        @endif

        <!-- En caso de ser medico, enfermero o fisio mostrar esto-->
        @if (auth()->user()->departamento_id == 3 ||
                auth()->user()->departamento_id == 2 ||
                auth()->user()->departamento_id == 1)
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 my-1">
                                <li class="nav-item mx-1 my-1">
                                    <a class="btn btn-outline-dark" href='{{ route('lista.residentes') }}'
                                        role="button">{{ __('Lista de Residentes') }}</a>
                                </li>
                                <li class="nav-item mx-1 my-1">
                                    <a class="btn btn-outline-dark" href="#" role="button">{{ __('Agenda') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
    </header>

    <!-- En caso de ser terapeuta-->
@elseif(auth()->user()->departamento_id == 4)
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 my-1 ">
                        <li class="nav-item mx-1 my-1">
                            <a class="btn btn-outline-dark" href='{{ route('lista.residentes') }}' role="button">{{ __('Lista de Residentes') }}</a>
                        </li>
                        <li class="nav-item mx-1 my-1">
                            <a class="btn btn-outline-dark" href="#" role="button">{{ __('Agenda') }}</a>
                        </li>
                        <li class="nav-item mx-1 my-1">
                            <a class="btn btn-outline-dark" href="{{ route('lista.grupos') }}" role="button">{{ __('Ver Grupos') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    </header>

    <!-- En caso de ser auxiliar-->
@elseif(auth()->user()->departamento_id == 5)
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 my-1 ">
                        <li class="nav-item mx-1 my-1" >
                            <a class="btn btn-outline-dark" href="{{ route('lista.residentes') }}" role="button">{{ __('Lista de Residentes') }}</a>
                        </li>
                        <li class="nav-item mx-1 my-1">
                            <a class="btn btn-outline-dark" href="#" role="button">{{ __('Agenda') }}</a>
                        </li>
                        <li class="nav-item mx-1 my-1">
                            <a class="btn btn-outline-dark"
                                href="{{ route('auxiliar.tareas', ['id' => auth()->user()->empleado->id]) }}"
                                role="button">{{ __('Ver Tareas') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    </header>
    <!-- En caso de ser familiar-->
@elseif(auth()->user()->departamento_id == 6)
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 my-1">
                        <li class="nav-item mx-1 my-1">
                            <a class="btn btn-outline-dark" href="{{ route('lista.residentesFamiliar') }}"
                                role="button">{{ __('Lista de Residentes') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    </header>

    <!-- En caso de ser gerencia-->
@elseif(auth()->user()->departamento_id == 7)
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 my-1 ">
                        <li class="nav-item mx-1 my-1">
                            <a class="btn btn-outline-dark" href="{{ route('lista.residentes') }}"
                                role="button">{{ __('Gestionar Residentes') }}</a>
                        </li>
                        <li class="nav-item mx-1 my-1">
                            <a class="btn btn-outline-dark" href="{{ route('familiar_empleado') }}"
                                role="button">{{ __('Gestionar Usuarios') }}</a>
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
            <div class="col d-flex flex-column align-items-center text-center">
                <!--Empleados-->
                @if (auth()->user()->departamento_id > 0 && auth()->user()->departamento_id < 6)
                    <div class="col d-flex flex-column align-items-center">
                        <p>{{ __('Ha iniciado sesión como') }} <br> <b>{{ auth()->user()->empleado->nombre }}
                                {{ auth()->user()->empleado->apellidos }}</b></p>
                    </div>


                    <!--familiares-->
                @elseif(auth()->user()->departamento_id == 6)
                    <div class="col d-flex flex-column align-items-center text-center">
                        <p>{{ __('Ha iniciado sesión como') }} <br> <b>{{ auth()->user()->familiar->nombre }}
                                {{ auth()->user()->familiar->apellidos }}</b></p>
                    </div>
                @else
                    <!--ADMIN-->
                    <div class="col d-flex flex-column align-items-center text-center">
                        <p>{{ __('Ha iniciado sesión como') }} <br> <b>{{ __('ADMINISTRADOR') }}</b></p>
                    </div>
                @endif

            </div>
        </div>
    </footer>
    <script src="{{ asset('js/interactividad.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
