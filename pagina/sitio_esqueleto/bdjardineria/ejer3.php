<?php
session_start();

if(isset($_REQUEST["cerrar"])) {
    unset($_SESSION["usuario"]); //usar unset para borrar varibales de sesión
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include "../includes/metadata2.php"; ?>
<body>
    <?php include "../includes/header2.php"; ?>
    <?php include "../includes/menu2.php"; ?>

    <section>
        <?php include "../includes/nav_BBDD.php"; ?>

        <main>
        <div class="fijo">
			<div>
				<a class="inicio" href="index.php">Inicio ejercicios BBDD</a><h2>ESTADÍSTICA</h2>
			</div>
            <?php if(isset($_SESSION["usuario"])) {//mostrar el nombre de usaurio y botón de cerrar sesión

                print"<div id='usuario'>" . $_SESSION["usuario"] . "</div>";
                print"<form id='cerrar' action=''>
    <input type='submit' name='cerrar' value='cerrar'>
    </form>";
            }?>
		</div>
        <div class="contenido">

        <?php
                    if (!isset($_SESSION["usuario"])) {//si no esta la variable de sesión usuario mostrar este mensaja
                        print"No se ha iniciado sesión, no puede acceder, por favor inicie sesión <a href='login.php'>aquí</a>";
                    } else {
                        // Conectar con el servidor de base de datos
                        include "conectabd.php";

                        // Enviar consulta
                        $instruccionSQL = "SELECT productos.Gama, gamasproductos.DescripcionTexto, COUNT(*) FROM productos INNER JOIN gamasproductos ON productos.Gama=gamasproductos.Gama GROUP BY productos.Gama";
                        $resulconsulta  = mysqli_query($conexion, $instruccionSQL)
                           or exit("Fallo en la consulta");

                        // Mostrar resultados de la consulta
                        $nfilas = mysqli_num_rows($resulconsulta);
                        if ($nfilas > 0) {
                            print "<table>";
                            print "<tr>";
                            print "<th>Gama</th>";
                            print "<th>Descripción</th>";
                            print "<th>Nº de productos</th>";
                            print "</tr>";

                            for ($i = 1; $i <= $nfilas; $i++) {
                                $unafila = mysqli_fetch_row($resulconsulta);
                                print "<tr>";
                                print "<td>" . $unafila[0] . "</td>";
                                print "<td>" . $unafila[1] . "</td>";
                                print "<td>" . $unafila[2] . "</td>";
                                print "</tr>";
                            }
                            print "</table>";
                        } else {
                            print "No hay productos";
                        }

                        // Cerrar conexión
                        mysqli_close($conexion);
                    }
?>


        </div>
		</main>
        <?php include "../includes/aside2.php"; ?>
    </section>
    <?php include "../includes/footer2.php"; ?>
</body>
</html>