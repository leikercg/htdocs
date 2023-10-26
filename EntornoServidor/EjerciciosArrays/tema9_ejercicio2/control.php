<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estiloss.css">

    <?php
function cambio($euros)
{
    $valor    = [500, 200, 100, 50, 20, 10, 5, 2, 1];
    $billetes = 0;

    for ($i = 0; $i <= 8; $i++) {
        if ($euros >= $valor[$i]) {
            $billetes = intval($euros / $valor[$i]);
            $euros    = $euros % $valor[$i];
            echo $billetes . " billetes de " . $valor[$i]."<br>";
        }

    }

}


    ?>


</head>
    <body>
    <header>
        <h1>CUESTIONARIO</h1>
    </header>

    <main>

                <?php
                if($_REQUEST) {
                    cambio($_REQUEST["euros"]);
                }
    ?>

<form action="control.php" method="get">

<h3>Formulario</h3>
<p>Escribe un número entero positivo</p>
<input type="number" name="euros" required min="1">
<input type="submit" value="Enviar">
<input type="reset" value="Borrar">
</form>

    </main>
    </body>
</html>