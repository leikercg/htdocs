<html>

<head>
    <title>@yield('title')</title><!--yield significa que aquí debera ser insertado lo que hay en la title content-->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body>
    <header>
        <h1>@yield('header')</h1>
    </header>
    <section>
        <aside></aside>
        @section('sidebar')
            Este es mi master sidebar     Esto es lo que se mostrará si no se defini nada en la vista hija-->
        @show


        <main>
            <h3>@yield('tituloSeccion')</h3>
            <div class="container">
                @yield('content')<!--yield significa que aquí debera ser insertado lo que hay en la sección content-->
            </div>
        </main>
        <nav></nav>
    </section>
    <footer>
    </footer>

</body>

</html>
