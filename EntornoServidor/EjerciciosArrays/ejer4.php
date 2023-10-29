<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilosimple.css">
    <link rel="stylesheet" href="estilos.css">
    <style>
        table{
            width: 400px;
            height: 2000px;
        }
    </style>
</head>
<?php
function rellenarArray()
{
    $array = [];
    for($i = 0; $i < 100; $i++) {
        $array[$i] = rand(0, 100);
    }
    sort($array);
    print_r($array);
    echo "<br> minima:$array[0] y maxima: $array[99]";
    return $array;

}
function rellenarIntervalos($ar)
{
    $intervbalos = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    for($i = 0; $i < 100; $i++) {
        if($ar[$i] >= 0 && $ar[$i] <= 9) {
            $intervbalos[0] += 1;
        }
        if($ar[$i] >= 10 && $ar[$i] <= 19) {
            $intervbalos[1] += 1;
        }
        if($ar[$i] >= 20 && $ar[$i] <= 29) {
            $intervbalos[2] += 1;
        }
        if($ar[$i] >= 30 && $ar[$i] <= 39) {
            $intervbalos[3] += 1;
        }
        if($ar[$i] >= 40 && $ar[$i] <= 49) {
            $intervbalos[4] += 1;
        }
        if($ar[$i] >= 50 && $ar[$i] <= 59) {
            $intervbalos[5] += 1;
        }
        if($ar[$i] >= 60 && $ar[$i] <= 69) {
            $intervbalos[6] += 1;
        }
        if($ar[$i] >= 70 && $ar[$i] <= 79) {
            $intervbalos[7] += 1;
        }
        if($ar[$i] >= 80 && $ar[$i] <= 89) {
            $intervbalos[8] += 1;
        }
        if($ar[$i] >= 90) {
            $intervbalos[9] += 1;
        }
    }

    return $intervbalos;
}

?>
<body>
    <?php
        $frecuencia = rellenarIntervalos(rellenarArray());
print "<table border=1>
    <tr>
        <th>intervalos</th>
        <th>Frecuencia</th>
    </tr>
    <tr>
        <td>0-9</td>
        <td>$frecuencia[0]</td>
    </tr><tr>
        <td>10-19</td>
        <td>$frecuencia[1]</td>
    </tr>
    <tr>
        <td>20-29</td>
        <td>$frecuencia[2]</td>
    </tr>
    <tr>
        <td>30-39</td>
        <td>$frecuencia[3]</td>
    </tr>
    <tr>
        <td>40-49</td>
        <td>$frecuencia[4]</td>
    </tr>
    <tr>
        <td>50-59</td>
        <td>$frecuencia[5]</td>
    </tr>
    <tr>
        <td>60-69</td>
        <td>$frecuencia[6]</td>
    </tr><tr>
        <td>70-79</td>
        <td>$frecuencia[7]</td>
    </tr>
    <tr>
        <td>80-89</td>
        <td>$frecuencia[8]</td>
    </tr>
    <tr>
        <td>90></td>
        <td>$frecuencia[9]</td>
    </tr>


</table><br><br>";


?>


</body>
</html>