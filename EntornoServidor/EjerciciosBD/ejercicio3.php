<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header><h1>Estadistica de productos por gama</h1></header>
    <main>
        <?php


            $conexion = mysqli_connect("localhost", "root", "", "jardineria") or die("no se pudo acceder a la base de datos a fallo la concexion");

            $consulta = "select gamasproductos.gama, descripciontexto, COUNT(codigoproducto) as numproductos from gamasproductos join productos on gamasproductos.gama =productos.gama GROUP BY gamasproductos.gama";

            $resultconsulta = mysqli_query($conexion, $consulta);

            $nfilas = mysqli_num_rows($resultconsulta);
            if($nfilas > 0) {

                print "<table border='1'>";
                print "<tr> <th>Gama</th> <th>Descripcion</th> <th>Nº de productos</th> </tr>";

                for($i = 0; $i < $nfilas; $i++) {
                    $resultado = mysqli_fetch_assoc($resultconsulta);
                    print "<tr>";
                    foreach($resultado as $key => $value) {
                        print "<td>$value</td>";
                    }
                    print "</tr>";
                }
                print "</table>";
            }
            mysqli_close($conexion);




        ?>







    </main>

</body>
</html>