<?php
session_start();

if(isset($_REQUEST["cerrar"])){
    unset($_SESSION["usuario"]);//usar unset para borrar varibales de sesión
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
				<a class="inicio" href="index.php">Inicio ejercicios BBDD</a><h2>COLSULTA CLIENTES</h2>
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
        if (!isset($_SESSION["usuario"])) {
            print"No se ha iniciado sesión, no puede acceder, por favor inicie sesión <a href='login.php'>aquí</a>";
        } else {

            include "conectabd.php";

            $sql           = "SELECT CodigoCliente, NombreCliente, NombreContacto from clientes";
            $resulconsulta = mysqli_query($conexion, $sql) or exit("Error al hacer la consulta");

            $nfilas = mysqli_num_rows($resulconsulta);
            print "<table border='1'>";
            print "<tr>";
            print "<th>CODIGO CLIENTE</th><th>NOMBRE CLIENTE</th><th>NOMBRE CONTACTO</th>";
            print "</tr>";
            for($i = 1; $i <= $nfilas; $i++) {
                $fila = mysqli_fetch_row($resulconsulta);		//Este comando cambia los índices con clave "NombreCampo" a índices escalares
                //print_r($fila); echo "<br/>";				//Si descomentas esta línea podrás ver como se forman los arrays fila con sus datos e índices escalares
                print "<tr>";
                print "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td>";
                print "</tr>";
            }
            print "</table>";
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