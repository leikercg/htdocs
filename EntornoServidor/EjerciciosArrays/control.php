<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">

    <?php
    function resto($valor)
    {
        $resultados = ["cero", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "diez", "once"];
        //$numeroEnLetra = $valor[($valor%12)];
        print "<h3>Resultado</h3>";
        print "el numero introducido es el " . $valor . " <br>
        y el resto de su división por 12 es " . $resultados[($valor % 12)];
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
                resto($_REQUEST["valor"]);
            }
    ?>

        <form action="control.php" method="get">

           <h3>Formulario</h3>
        <p>Escribe un número entero positivo</p>
        <input type="number" name="valor" required min="12">
        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
        </form>

    </main>
    </body>
</html>