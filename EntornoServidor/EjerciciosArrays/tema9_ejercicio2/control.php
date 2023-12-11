<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estiloss.css">

    <?php
function cambio($euros)
{
    $desglose = ["500" => 0, "200" => 0, "100" => 0, "50" => 0, "20" => 0, "10" => 0, "5" => 0, "2" => 0, "1" => 0];

    foreach ($desglose as $moneda => &$cantidad) {/*es necesario para modificar el valor de ese indice*/
if($euros >=$moneda) {
    $cantidad = (int)($euros / $moneda);
    $euros    = $euros % $moneda;
    print $cantidad." billetes de ".$moneda."<br>";
}else{
    print $cantidad." billetes de ".$moneda."<br>";
}
    }


}


    ?>


</head>
    <body>
    <header>
        <h1>CUESTIONARIO</h1>
    </header>

    <main>

                <?php
                if($_REQUEST) {
                    cambio($_REQUEST["euros"]);
                }
    ?>

<form action="control.php" method="get">

<h3>Formulario</h3>
<p>Escribe un número entero positivo</p>
<input type="number" name="euros" required min="1">
<input type="submit" value="Enviar">
<input type="reset" value="Borrar">
</form>

    </main>
    </body>
</html>