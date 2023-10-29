<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">

    <?php
    function tabla($filas, $columnas)
    {
        $n = 0;
        print "<h3> TABLA DE " . $filas . " X " . $columnas . " </h3>";

        print "<table border ='1'>";
        for ($i = 1; $i <= $filas; $i++) {
            print "<tr>";
            for ($j = 1; $j <= $columnas; $j++) {
                $n++;
                print "<td>" . $n . "</td>";
            }
            print "</tr> ";
        }
        print "</table>";

    }
    ?>


</head>
<body>

<header>
    <h1>RESULTADOS DE LAS TABLAS</h1>
  </header>
    <main>

<?php
$filas        = $_REQUEST["filas"];
    $columnas = $_REQUEST["columnas"];

    tabla($filas, $columnas);

    tabla($filas, $columnas);

    ?>
    </main>
</body>
</html>