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
        <?php include "../includes/nav_BBDD.php"; ?>

        <main>
        <div class="fijo">
			<div>
				<a class="inicio" href="index.php">Inicio ejercicios BBDD</a><h2>CLIENTES POR PAÍS</h2>
			</div>
		</div>
        <div class="contenido">
        <?php
        if (!isset($_SESSION["usuario"])) {//si no esta la variable de sesión usuario mostrar este mensaja
            print"No se ha iniciado sesión, no puede acceder, por favor inicie sesión <a href='login.php'>aquí</a>";
        } else {
            // Conectar con el servidor de base de datos
            include("conectabd.php");

            if (isset($_REQUEST['enviar'])) {
                $pais = $_REQUEST['Pais'];
                // Enviar consulta
                $instruccion = "SELECT CodigoCliente, NombreCliente, NombreContacto, ApellidoContacto  FROM  clientes WHERE Pais='$pais' ORDER BY CodigoCliente";
                $resconsulta = mysqli_query($conexion, $instruccion)
                    or exit("Fallo en la consulta");
                // Mostrar resultados de la consulta
                print "<h1>LISTADO  DE CLIENTES DE --" . $pais . "-- EN BD JARDINERIA</h1><br>";
                print "<table>";
                print "<tr> <th>CÓDIGO</th> <th>NOMBRE</th> <th>NOMBRE CONTACTO</th> <th>APELLIDO CONTACTO</th> </tr>";
                while ($resultado = mysqli_fetch_row($resconsulta)) {
                    print "<tr>";
                    for($i = 0; $i < 4; $i++) {
                        print"<td>" . $resultado[$i] . "</td>";
                    }
                    print "</tr>";
                }
                print "</table>";
                print "</br><a href='ejer4.php'>Realizar nueva consulta</a>";
            } else {
                print "<h1>Consulta de clientes por pais</h1><br>";
                $instruccion = "SELECT DISTINCT Pais FROM clientes ORDER BY Pais";
                $resconsulta = mysqli_query($conexion, $instruccion)
                    or exit("Fallo en la consulta");

                print "<form action='ejer4.php' method='GET'>";
                print "Elige País &nbsp";
                print "<select name='Pais'>";
                $nfilas = mysqli_num_rows($resconsulta);
                if ($nfilas > 0) {
                    for ($i = 1; $i <= $nfilas; $i++) {
                        $resultado = mysqli_fetch_row($resconsulta);
                        print "<option>" . $resultado[0] . "</option>";
                    }
                }
                print "</select>";
                print "<br><br><p><input type='submit' name='enviar' value='Enviar consulta'></p>";
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