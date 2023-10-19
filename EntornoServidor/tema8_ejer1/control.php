<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<?php
$nombre = $_REQUEST["nombre"];
$apellidos = $_REQUEST["apellidos"];
$anio = $_REQUEST["anio"];
$animal = $_REQUEST["animal"];

echo "<p>Bienvenido $nombre $apellidos<p>";

if($anio==2023){
    echo "<p>Respuesta 1 correcta <p>";
}else{
    echo "<p>Respuesta 1 incorrecta <p>";
}

    ?>
</body>
</html>