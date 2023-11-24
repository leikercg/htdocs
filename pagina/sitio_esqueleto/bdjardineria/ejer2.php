
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
        <?php include "../includes/nav_bbdd.php"; ?>

        <main>
        <div class="fijo">
			<div>
				<a class="inicio" href="index.php">Inicio ejercicios BBDD</a><h2>COLSULTA PRODUCTOS</h2>
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

    if (isset($_REQUEST['gama'])) {
        $gama = $_REQUEST['gama'];
        // Enviar consulta
        $instruccion = "SELECT CodigoProducto, Nombre, CantidadEnStock FROM  productos WHERE Gama='$gama' ORDER BY Nombre";
        $resconsulta = mysqli_query($conexion, $instruccion)
           or exit("Fallo en la consulta");

        // Mostrar resultados de la consulta
        $fecha = date("d-m-Y");
        print "<h1>Productos de la gama $gama - Fecha: $fecha </h1><br>";
        $numreg = mysqli_num_rows($resconsulta);
        if ($numreg == 0) {
            print "<h1>Actualmente no existe ningún producto dado de alta en esta gama</h1>";
        } else {
            print "<table>";
            print "<tr>";
            print "<th>Código producto</th>";
            print "<th>Nombre</th>";
            print "<th>CantidadEnStock</th>";
            print "</tr>";

            while ($resultado = mysqli_fetch_row($resconsulta)) {  //Otra forma de recorrer todos los registros hasta que mysqli_fetch_row devuelva 'false'
                print "<tr>";
                for ($i = 0; $i <= 2; $i++) {   //Sabiendo que hay 3 campos por registro se pueden imprimir las 3 celdas de cada fila con un bucle
                    print "<td>" . $resultado[$i] . "</td>";
                }
                print "</tr>";
            }

            print "</table>";
        }
        print "<br><p><a href='ejer2.php'>Realizar nueva consulta</a></p>";
    } else {
        print "<h1>Consulta de productos por gama</h1><br>";

        $instruccion = "SELECT Gama, DescripcionTexto FROM  gamasproductos ORDER BY DescripcionTexto";
        $resconsulta = mysqli_query($conexion, $instruccion)
           or exit("Fallo en la consulta");

        print "<form action='ejer2.php' method='GET'>";
        print "<p>Elige una de las gamas de productos disponible &nbsp;";
        print "<select name='gama'>";

        $nfilas = mysqli_num_rows($resconsulta);
        if ($nfilas > 0) {
            for ($i = 1; $i <= $nfilas; $i++) {
                $resultado = mysqli_fetch_row($resconsulta);
                print "<option value='$resultado[0]'>" . $resultado[0] . "</option>";
            }
        }
        print "</select></p><br>";
        print "<p><input type='submit' name='enviar' value='Enviar consulta'></p>";
        print "</form>";
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