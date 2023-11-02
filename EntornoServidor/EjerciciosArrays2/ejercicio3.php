<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estiloss.css">
</head>
<body>
    <?php

        $listaEquipos = ["F.C. Barcelona" => 82, "Real Madrid" => 84, "Atlético Madrid" => 78, "Valencia" => 75, "Sevilla" => 76, "Villarreal" => 60, "Málaga" => 50, "Espanyol" => 47, "Athletic Bilbao" => 55, "Celta" => 51, "Real Sociedad" => 46, "Rayo Vallecano" => 49, "Getafe" => 36, "Osasuna" => 33, "Elche" => 41, "Deportivo" => 38, "Almería" => 29, "Levante" => 37, "Granada" => 35, "Zaragoza" => 32];

    ksort($listaEquipos); //mejor hacer copias para no modificar el array al ordenarlo
    print '<h3>tabla de clasificación</h3>
        <form action="ejercicio3.php">
        <select name="equipo">
        <option value="" selected disabled>Seleccione una opción</option>';
    foreach($listaEquipos as $equipo => $puntos) {

        print "<option value='$equipo'>$equipo</option>";
    }
    print "<input type='submit' value'enviar'>
            </select>
            </form>";

    if($_REQUEST) {
        $equipos = $_REQUEST["equipo"];
        $equipo  = $equipos;
        $puntos  = $listaEquipos[$equipo];
        rsort($listaEquipos);
        $posicion = array_search($puntos, $listaEquipos);

        print '<table border="1">
        <tr>
            <th>Posicion</th>
            <th>Equipo</th>
            <th>Puntos</th>
        </tr>';
        foreach($listaEquipos as $key => $value) {
            $key=intval($key)+1;
            print "<tr><td>$key</td><td>equipo</td><td>$value</td></tr>";
        }
        print "</table>";
        print "<h3> el $equipo tiene $puntos y esta " . ($posicion + 1) . "º en la tabla";
    }



    ?>

</body>
</html>