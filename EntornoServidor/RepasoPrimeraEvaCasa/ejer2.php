<?php
function esprimo1($x)
{
    if($x == 0) {
        return false;
    }
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

function tablaNxM($n, $m)
{
    $tamanio = $n * $m;

    print "<h1>TABLA HTML DE $n x $m</h1>";
    print "<table border='1'>";
    $list = [];

    $contador = 0;

    do {
        if(esprimo1($contador)) {
            array_push($list, $contador);
        }
        $contador++;
    } while(count($list) <= $tamanio);
    $indice = 0;
    for($i = 1; $i <= $n; $i++) {
        print "<tr>";
        for($j = 1; $j <= $m; $j++) {
            print "<td>" . $list[$indice] . "</td>";
            $indice++;
        }print "</tr>";
    }

    print "</table>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header><h1>REPASO 1ª EVALUACIOÓN</h1></header>
    <section>
        <aside></aside>
        <main>
            <div class="titulo"> <h2>Ejercicio 2</h2></div>
            <a href="index.php" class="inicio">Inicio</a>
            <div class="contenido">
                <div class="centrar">
                     <?php
                  if($_REQUEST) {
                      $filas    = $_REQUEST["filas"];
                      $columnas = $_REQUEST["columnas"];

                      tablaNxM($filas, $columnas);

                  }
                    ?>
                </div>

                <h3>Tabla de <i>n</i> y <i>m</i> columnas</h3>
                <form action="ejer2.php" class="formulario">
                    <label for="">Introduce el número de filas de la tabla</label>
                    <input type="number" name="filas" id="" min="1" required><br><br>
                    <label for="">Introduce el numero de columnas</label>
                    <input type="number" name="columnas" id="" required min="1"><br><br>
                    <input type="submit" value="Enviar" name="" id="">

                </form>

            </div>
        </main>
        <nav></nav>
    </section>
    <footer></footer>

</body>
</html>