<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estiloss.css">

</head>

    <body>
    <header>
        <h1>SOLUCION</h1>
    </header>

    <main>

    <?php
    if($_REQUEST) {
        $semana = $_REQUEST["v"];
    print_r($semana);

        $media  = array_sum($semana) / count($semana);
        print "<h4> la temperatura media de la semana ha sido " . round($media,2) . " esta semana</h4>";
        echo "<a href='main.html'>volver al formulario</a>";


    } else {
        ?>
    <a href="main.html">Algo salió mal, volver al formulario</a>

    <?php
    }
    ?>

    </main>
    </body>
</html>