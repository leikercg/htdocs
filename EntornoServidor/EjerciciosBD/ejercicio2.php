<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header><h1>Consulta de productos</h1></header>
    <main>
        <?php
        if($_REQUEST) {
            $gama = $_REQUEST["gama"];

            $conexion = mysqli_connect("localhost", "root", "", "jardineria") or exit("no se pudo acceder a la base de datos a fallo la concexion");

            $consulta = "select codigoproducto, nombre, cantidadenstock from productos where gama = '$gama' ";

            $resultconsulta = mysqli_query($conexion, $consulta);

            $nfilas = mysqli_num_rows($resultconsulta);
            if($nfilas > 0) {

                print "<table border='1'>";
                print "<tr> <th>Código</th> <th>Nombre</th> <th>stock</th> </tr>";

                for($i = 0; $i < $nfilas; $i++) {
                    $resultado = mysqli_fetch_assoc($resultconsulta);
                    print "<tr>";
                    foreach($resultado as $key => $value) {
                        print "<td>$value</td>";
                    }
                    print "</tr>";
                }
                print "</table>";
            } else {
                print "<h3>No hay productos en la gama de $gama.</h3>";
            }

            print '<a href="ejercicio2.php">Nueva consulta</a>';
            mysqli_close($conexion);

        } else {
            // recorremos las gamas para mostrarlas en un <formulario></formulario
            $conexion       = mysqli_connect('localhost', 'root', '', 'jardineria');
            $consulta       = "select gama from gamasproductos";
            $resultconsulta = mysqli_query($conexion, $consulta);

            $nfilas = mysqli_num_rows($resultconsulta);
            if($nfilas > 0) {
                print "<form action='ejercicio2.php' method='get'>";
                print "<select name='gama'>";
                print "<option value='no' selected disabled >Elige una gama</option>";
                for($i = 0; $i < $nfilas; $i++) {
                    $resultado = mysqli_fetch_assoc($resultconsulta);
                    foreach($resultado as $key => $value) {
                        print "<option value=" . $value . ">$value</option>"; // para imprimir solo el valor, no el nombre de la columna
                    }
                }
                //dar nombre al boton enviar para enviar name ='enviar';
                print "<input type='submit' value='enviar'>
                </select>
            </form>";
                mysqli_close($conexion);
            }
        }

        ?>







    </main>

</body>
</html>