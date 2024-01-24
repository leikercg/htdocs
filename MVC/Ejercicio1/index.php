<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>clientes</h1>
    </header>
    <?php
        $conexion = mysqli_connect("localhost", "root", "") or die("No se puede conectar con el servidor <br>");

    mysqli_select_db($conexion, "jardineria") or die("No se pude conectar con la base de datos");

    $resultconsulta = mysqli_query($conexion, "Select codigocliente, nombrecliente, nombrecontacto from clientes;");


    $articles = array();
    while ($row = $resultconsulta->fetch_array())  {
        $articles[] = $row;
    }
    $conexion->close();

    include("vista.php");
    ?>

</body>
</html>