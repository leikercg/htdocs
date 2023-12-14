<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
    <h1>REPASO 1ª EVALUACIÓN</h1>
    </header>
    <section>
        <aside></aside>
        <main>
            <div class="titulo"><h2>Ejercicio 3</h2></div>
            <a href="index.php" class="inicio">Inicio</a>
            <div class="fecha">
                <?php
                    $fecha = date("d-m-Y");
                print "Fecha: " . $fecha;
                ?>
            </div>
            <div class="contenido">

                <h3>Consultas de productos por proveedor</h3>
                    <?php
                    if($_REQUEST) {
                        $proveedor = $_REQUEST["proveedor"];
                        $conexion  = mysqli_connect("localhost", "root", "", "jardineria");

                        $sql = "SELECT codigoProducto as 'Código producto', Gama, Nombre, Dimensiones, cantidadEnstock as 'Cantidad en Stock', precioproveedor as 'Precio proveedor' from productos where proveedor='$proveedor'";

                        $consulta = mysqli_query($conexion, $sql);

                        $nfilas = mysqli_num_rows($consulta);

                        if($nfilas > 0) {
                            print "<table border=1>";
                            print"<tr>";
                            print"<td>Codigo</td> <td>Gama</td><td>Nombre</td><td>Dimensiones</td><td>Cantidad</td><td>Precio Proveedor</td> </tr>";
                            $total = 0;
                            $stock = 0;
                            for($i = 0; $i < $nfilas; $i++) {

                                $resultado = mysqli_fetch_array($consulta);
                                print "<td>" . $resultado[0] . "</td>";
                                print "<td>" . $resultado[1] . "</td>";
                                print "<td>" . $resultado[2] . "</td>";
                                print "<td>" . $resultado[3] . "</td>";
                                print "<td>" . $resultado[4] . "</td>";
                                print "<td>" . $resultado[5] . "</td>";
                                print"</tr>";
                                $total += $resultado[5];
                                $stock += $resultado[4];

                            }
                            print "<tr><td colspan = 5> Total productos diferentes</td><td>$nfilas</td></tr>";

                            print "<tr><td colspan = 5> Media precio</td><td>" . $total / $nfilas . "</td></tr>";

                            print "<tr><td colspan = 5> Prodcutos totales</td><td>" . $stock . "</td></tr>";

                            print "</table>";
                        }
                        mysqlI_close($conexion);
                    }
                ?>
                <form action="ejer3.php" class="formulario">
                    <label for="">Selecciona proveedor</label>
                    <select name="proveedor" id="">
                        <?php
                    $conexion = mysqli_connect("localhost", "root", "", "jardineria");
                $sql          = "SELECT distinct proveedor from productos order by proveedor ";
                $consulta     = mysqli_query($conexion, $sql);

                $nfilas = mysqli_num_rows($consulta);

                for($i = 0; $i < $nfilas; $i++) {
                    $resultado = mysqli_fetch_array($consulta);
                    print"<option value='" . $resultado[0] . "'>" . $resultado[0] . "</option>";
                }
                mysqli_close($conexion);
                ?>
                    </select>
                    <input type="submit" value="Enviar" name="" id="">
                </form>

            </div>
        </main>
        <nav></nav>
    </section>
    <footer></footer>
</body>
</html>