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
                    <label for="titulo">título</label>
                    <div>
                        <input class="campo" type="text" name="titulo" id="titulo"> <button>Lupa</button>
                    </div>
                </form>
                <form action="#">
                    <label for="titulo">director</label>
                    <div>
                        <input class="campo" type="text" name="titulo" id="titulo"> <button>Lupa</button>
                    </div>
                </form>
                <div id="generos">
                    <span>género</span>
                    <div>
                        <div class="fila">
                            <a href="#">Acción</a>
                            <a href="#">Aventura</a>
                            <a href="#">Ciencia ficción</a>
                        </div>
                        <div class="fila">
                            <a href="#">Comedia</a>
                            <a href="#">Historia</a>
                            <a href="#">Fantasia</a>
                        </div>
                        <div class="fila">
                            <a href="#">Fantasía</a>
                            <a href="#">Animación</a>
                            <a href="#">Romance</a>
                        </div>
                        <div id="terror">
                            <a href="#">Terror</a>
                        </div>

                    </div>
                </div>
            </div>

        </nav>
        <main>

                <div id="contenedorDerecha">
                    <h3>@yield('main_title')</h3>
                    <div id='peliculas'>
                        <table>
                            @foreach ($movies->chunk(3) as $chunk) <!--divide el array movies e segmentos de 3 -->
                            <tr>
                                @foreach ($chunk as $movie)
                                    <td><img class="portada" src="{{ asset('images/' . $movie->image) }}" alt="Portada de la película"></td>
                                @endforeach
                            </tr>
                        @endforeach

                        </table>
                    </div>

                </div>

            @show
        </main>
    </section>
</body>

</html>
