<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
function original(&$myarray)
{

    print "<h3>DATOS DEL ARRAY RECIBIDO</h3>
    <table border =1>";
    foreach ($myarray as $k => $v) {
        print "<tr>
                <td>$k</td><td>$v</td></tr>";
    }
    print "</table> <br>";

}
function clave(&$myarray)
{
    ksort($myarray);
    print "<h3>DATOS DEL ARRAY CLAVE</h3>
    <table border =1>";
    foreach ($myarray as $k => $v) {
        print "<tr>
                <td>$k</td><td>$v</td></tr>";
    }
    print "</table> <br>";
}

function valor(&$myarray)
{
    asort($myarray);
    print "<h3>DATOS DEL ARRAY POR VALOR</h3>
    <table border =1>";
    foreach ($myarray as $k => $v) {
        print "<tr>
                <td>$k</td><td>$v</td></tr>";
    }
    print "</table> <br>";
}
    ?>
</head>
<body>
    <?php
    $localidades = ["Palencia" => 80000, "Valladolid" => 350000, "Oviedo" => 120000, "Madrid" => 3320000, "Barcelona" => 1620000, "Zaragoza" => 666880, "Soria" => 39112, "Huesca" => 52463, "Teruel" => 35691];

    print "<h2>LLAMADAS A FUNCIONES CON ARRAY DE LOCALIDADES</h2>";
    original($localidades);

    clave($localidades);
    valor($localidades);
    ?>

</body>
</html>