<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estiloss.css">

    <?php

    function generarArrayAleatorio($size, $min, $max)
    {
        $arr = [];
        print "<h3>Array aleatorio</h3>";
        print "<p>Array aleatorio: ";
        for ($i = 0; $i <= $size - 1; $i++) {
            $arr[$i] = rand($min, $max);
            if($i != $size - 1) {
                print  $arr[$i] . ", ";
            } else {
                print  $arr[$i];
            }
        }
        print "</p>";
        return $arr;
    }

    function eliminarRepetidos($arr)
    {
        $unico = [];
        if(is_array($arr)) {
            $unico = array_unique($arr);
            $unico = array_values($unico);
            print "<p>Array unico: ";
            for ($i = 0; $i < count($unico); $i++) {
                if($i != count($unico) - 1) {
                    print  $unico[$i] . ", ";
                } elseif($i == count($unico) - 1) {
                    print  $unico[$i];
                }
            }
            print "</p>";
        }
        return $unico;
    }
    function media($arr)  {
        $suma = array_sum($arr);
        $divisor = count($arr);

        echo " la media de valores del array sin duplicados es: ".$suma / $divisor;
    }

    ?>


</head>
    <body>
    <header>
        <h1>ARRAYS NUMERERICOS</h1>
    </header>

    <main>

                <?php
                $myarray = generarArrayAleatorio($_REQUEST["longitud"], $_REQUEST["minimo"], $_REQUEST["maximo"]);


    media(eliminarRepetidos($myarray));
    ?>

<form action="control.php" method="get">

<h3>ARRAYS NUMERERICOS</h3>

<form action="control.php" method="get">

<h3>Formulario</h3>
<p>Escribe la longitud del array</p>
<input type="number" name="longitud" required min="1"><br>
<p>Valor mínimo</p>
<input type="number" name="minimo" required ><br>
<p>Valor máximo</p>
<input type="number" name="maximo" required ><br>

<input type="submit" value="Enviar">
<input type="reset" value="Borrar">
</form>

    </main>
    </body>
</html>