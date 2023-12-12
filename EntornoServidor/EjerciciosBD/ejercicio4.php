<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header><h1>Consulta de clientes por pais</h1></header>
    <main>
        <?php
        if($_REQUEST) {
            $pais = $_REQUEST["pais"];

            $conexion = mysqli_connect("localhost", "root", "", "jardineria") or die("no se pudo acceder a la base de datos a fallo la concexion");

            $consulta = "Select CodigoCliente, NombreCliente,NombreContacto,ApellidoContacto, Pais from clientes where UPPER(Pais)= UPPER('$pais') "; //Compara ambos en mayusculas

            $resultconsulta = mysqli_query($conexion, $consulta);

            $nfilas = mysqli_num_rows($resultconsulta);
            if($nfilas > 0) {

                print "<table border='1'>";
                print "<tr> <th>Código</th> <th>Nombre Cliente</th> <th>Nombre Contacto</th> <th> Contacto</th><th> Pais</th></tr>";

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
     print '<a href="ejercicio4.php">Nueva consulta</a>';
     mysqli_close($conexion);

        } else {
            ?>

    <form action="ejercicio4.php" method="get">
        <select name="pais" id="">
            <option value="no" selected disabled >Elige un pais</option>
            <option value="australia">Australia</option>
            <option value="españa">España</option>
            <option value="france">France</option>
            <option value="spain">Spain</option>
            <option value="united kingdom">United Kingdom</option>
            <option value="usa">USA</option>
            <input type="submit" value="enviar">
        </select>
    </form>

        <?php
        }
        ?>







    </main>

</body>
</html>