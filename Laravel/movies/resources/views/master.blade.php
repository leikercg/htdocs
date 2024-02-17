<html>
<head>
    <title>@yield('Cartelera')</title><!--yield significa que aquí debera ser insertado lo que hay en la title content-->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"> {{-- Asset es la ruta al directorio public y los corchetes son para insertar una variable --}}
    <link rel="stylesheet" href="/css/app.css">
    <script src="js/app.js" defer></script>

</head>

<body>
    <section>
        <nav>
            <img src='{{ asset('images/itsfree_header.gif') }}'>
            <div id="contenedorIzquierdo">
                <h3><a href="{{ route('mostrar') }}">PELICULAS ONLINE</a></h3>
                <div id="botonesIzquierdos">
                    <a href="#">Últimas novedades</a>
                    <a href="#">Próximos estrenos</a>
                </div>
                <form action="#">
                    <label for="titulo"><b>título</b></label>
                    <div>
                        <input class="campo" type="text" name="titulo" id="titulo"> <button>Lupa</button>
                    </div>
                </form>
                <form action="#">
                    <label for="director"><b>director</b></label>
                    <div>
                        <input class="campo" type="text" name="director" id="director"> <button>Lupa</button>
                    </div>
                </form>
                <div id="generos">
                    <span><b>género</b></span>
                    <div>
                        <div class="fila">
                            <a href="{{route('genero',['genero'=>'Acción'])}}">Acción</a>
                            <a href="{{route('genero',['genero'=>'Aventura'])}}">Aventura</a>
                            <a href="{{route('genero',['genero'=>'Ciencia ficción'])}}">Ciencia ficción</a>
                        </div>
                        <div class="fila">
                            <a href="{{route('genero',['genero'=>'Comedia'])}}">Comedia</a>
                            <a href="{{route('genero',['genero'=>'Drama'])}}">Drama</a>
                            <a href="{{route('genero',['genero'=>'Historia'])}}">Historia</a>
                        </div>
                        <div class="fila">
                            <a href="{{route('genero',['genero'=>'Fantasía'])}}">Fantasía</a>
                            <a href="{{route('genero',['genero'=>'Animación'])}}">Animación</a>
                            <a href="{{route('genero',['genero'=>'Romance'])}}">Romance</a>
                        </div>
                        <div id="terror">
                            <a href="{{route('genero',['genero'=>'Terror'])}}">Terror</a>
                        </div>

                    </div>
                </div>
            </div>

        </nav>
        <main>

                <div id="contenedorDerecha">
                    <h3>@yield('main_title')</h3>
                    @section('content')

                </div>

            @show
        </main>
    </section>
</body>

</html>
