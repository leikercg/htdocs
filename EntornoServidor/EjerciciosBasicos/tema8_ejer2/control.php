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
        <h1>RESULTADOS</h1>
    </header>
    <?php
        $cantidad = $_REQUEST["cantidad"];
        $moneda = $_REQUEST["moneda"];

        if(is_numeric($cantidad)){
            if($moneda =="dolares"){
                echo  "<p>".$cantidad."€ son ".$cantidad*1.8678."dolares </p>";
            }else{
                echo  "<p>".$cantidad."€ son ".$cantidad*0.8678."libras </p>";
            }

        }else{
            echo "<p>Algo salió mal</p>";
        }


    ?>
    <a href="main.html">Volver al conversor</a>
</body>
</html>