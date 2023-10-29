<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">

    <?php
    function tabla($filas,$columnas){

        echo "<h3> TABLA DE ".$filas." X ".$columnas." </h3>";

        echo "<table border ='1'>";


    }
    ?>


</head>
<body>

<header>
    <h1>RESULTADOS DE LAS TABLAS</h1>
  </header>
    <main>

<?php
$filas = $_REQUEST["filas"];
$columnas = $_REQUEST["columnas"];

    tabla($filas,$columnas);







    ?>
    </main>
</body>
</html>