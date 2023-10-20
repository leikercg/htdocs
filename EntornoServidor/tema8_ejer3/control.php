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
    <table>
        <tr>
            <td>Euros</td>
            <td>Dólares</td>
            <td>Libras</td>
        </tr>
            <?php
                $dolares = $_REQUEST["dolares"];
                $libras = $_REQUEST["libras"];

                if(is_numeric($dolares) && is_numeric($libras)){
                for ($i=1; $i <= 10 ; $i++) {
                    echo "<tr>
                            <td>".$i."</td>
                            <td>".$i*$dolares."</td>
                            <td>".$i*$libras."</td>
                        </tr> ";
                }
                }else{
                    echo "<p>Algo salió mal</p>";
                }


            ?>

    </table>
    <a href="main.html">Volver al conversor</a>
</body>
</html>