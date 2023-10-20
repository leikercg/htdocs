<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

<header>
    <h1>RESULTADOS DEL CUESTIONARIO</h1>
  </header>
    <main>

<?php
$nombre = $_REQUEST["nombre"];
$apellidos = $_REQUEST["apellidos"];
if(isset($_REQUEST)){
}

echo "<p>Bienvenido $nombre $apellidos<p>";


if((isset($anio)) && $_REQUEST["anio"] == 2023 ){
    echo "<p>Respuesta 1 correcta <p>";
}else{
    echo "<p>Respuesta 1 incorrecta <p>";
}

if(isset($_REQUEST["loros"]) && isset($_REQUEST["gallinas"]) && !isset($_REQUEST["perros"]) && !isset($_REQUEST["gatos"])){
    echo "<p>Respuesta 2 correcta <p>";
}else{
    echo "<p>Respuesta 2 incorrecta <p>";
}


    ?>
    <a href="main.html">volver al cuestionario</a>
    </main>
</body>
</html>