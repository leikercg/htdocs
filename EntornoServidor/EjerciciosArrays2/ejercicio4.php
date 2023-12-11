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
    $myarray = [];
    $myarray = range(1, 20, 1); //crea un array dentro de un rango marcado
    $cadena = implode("-", $myarray); //devuelve un string con un separador indicado
    print $cadena."<br>";

    $pares =array_filter($myarray, function ($value) {//se pasa una funcion y devuelve solo los valores true en un array

        return $value % 2 == 0;

    });
    $cadena = implode("-", $pares);//devuelve un string con el separador indicado
    print $cadena."<br>";

    function cuadrado($num)  {
        return pow($num,2);
    }

    $alCuadrado = array_map("cuadrado",$pares);//funcion entre comillas, se pasa la funcion a todos los elmentos del array

    $cadena = implode("-", $alCuadrado);
    print $cadena."<br>";

    $suma = array_sum($alCuadrado);
    print $suma."<br>";


    arsort($myarray);//ordena reverso manteniendo los indices
    $a = implode("-", $myarray);
    print $a."<br>";







    ?>

</body>
</html>