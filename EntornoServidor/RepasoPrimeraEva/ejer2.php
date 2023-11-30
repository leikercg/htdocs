<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
        <?php
        function esprimo1($x)
        {
            if ($x == 1) {
                return false;
            }
            if ($x == 2) {
                return true;
            }

            for ($i = 2; $i <= $x / 2; $i++) {
                if ($x % $i == 0) {
                    return false;
                }
            }
            return true;

        }

        function tabla($filas, $columnas)
        {
            $lista  = [];
            $tamaño = $filas * $columnas;
            $n      = 2;

            while(sizeof($lista) != $tamaño) {
                if(esprimo1($n)) {
                    array_push($lista, $n);
                }
                $n++;
            }

            $indice = 0;
            print "<h3> tabla de " . $filas . " filas  y " . $columnas . " columnas con los primeros $tamaño números primos </h3>";

            print "<table border ='1'>";
            for ($i = 1; $i <= $filas; $i++) {
                print "<tr>";
                for ($j = 1; $j <= $columnas; $j++) {

                    print "<td>" . $lista[$indice] . "</td>";
                    $indice++;
                }
                print "</tr> ";
            }
            print "</table>";

        } ?>
<body>
<header>
        <h1>Repaso 1ª evaluación</h1>
    </header>
    <section>
        <nav></nav>
        <div class="inicio"><a href="main.php">Inicio</a></div>
        <main>

            <h1>Ejercicio 2</h1>

            <?php
                    if(!$_REQUEST) {
                        ?>
            <div class="tituloForm"><h2>Tabla de <i>n</i> filas y <i>m</i> columnas</h2></div>

            <div class="contenedorForm">
            <form class="formulario" action="">
                <label for="">Introduce el número de filas de la tabla</label>
                <input type="number" step="1" name="filas" id=""><br><br>
                <label for="">Introduce el número de columnas de la tabla</label>
                <input type="number" step="1" name="columnas" id=""><br><br>
                <input class="boton"type="submit" name="" id="">
            </div>

            <?php
                    } else {
                        $filas    = $_REQUEST["filas"];
                        $columnas = $_REQUEST["columnas"];

                        tabla($filas, $columnas);
                        ?>
            <br><br>
            <div class="tituloForm"><h2>Tabla de <i>n</i> filas y <i>m</i> columnas</h2></div>
            <div class="contenedorForm">
            <form class="formulario" action="">
                <label for="">Introduce el número de filas de la tabla</label>
                <input type="number" step="1" name="filas" id=""><br><br>
                <label for="">Introduce el número de columnas de la tabla</label>
                <input type="number" step="1" name="columnas" id=""><br><br>
                <input class="boton"type="submit" name="" id="">
            </div>
                    <?php
                    }
                    ?>
             </form>
		</main>
		<aside></aside>
	</section>
	<footer></footer>


</body>
</html>