<html>

<head>
    <title>@yield('Cartelera')</title><!--yield significa que aquí debera ser insertado lo que hay en la title content-->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"> {{-- Asset es la ruta al directorio public y los corchetes son para insertar una variable--}}
    <link rel="stylesheet" href="/css/app.css">
    <script src="js/app.js" defer></script>

</head>

<body>
    <section>
        <nav>
            <img src='{{asset("images/itsfree_header.gif")}}'>

        </nav>
        <main>
            @section('derecha')

            @show
        </main>
    </section>
</body>

</html>
