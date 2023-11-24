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
				<a class="inicio" href="index.php">Inicio ejercicios BBDD</a><h2>BORRAR CLIENTE</h2>
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
                        if (isset($_REQUEST['respuesta'])) { // 3ª parte:  se procede a borrar el registro del cliente y, previamente, todos lo registros relacionados en tablas subordinadas
                            borrarCliente($_REQUEST['codigo'], $_REQUEST['respuesta']);
                        } else {	// 2ª Parte: se muestran los datos del cliente y se pide confirmación de borrado
                            if(isset($_REQUEST['telefono'])) {
                                $tel = $_REQUEST['telefono'];
                                mostrarClienteyPreguntarBorrar($tel);
                            } else { // 1ª parte: se pide el nº de teléfono del cliente
                                ?>
		<form action='<?= $_SERVER['PHP_SELF']; ?>' method='GET'>	<!--Utilizando array superglobal $_SERVER-->
			<label>Escribe el teléfono del cliente:</label>
			<input type='text' name='telefono' value='' pattern='[0-9]{9,11}' size='11'> <!--En vez de usar required haremos uso de header(Location: ) en PHP-->
			<input type="submit" value="Obtener datos del cliente">
		</form>
<?php
                            }
                        }
                    }
?>
        </div>
		</main>
        <?php include "../includes/aside2.php"; ?>
    </section>
    <?php include "../includes/footer2.php"; ?>
</body>
</html>
<?php
//Funciones auxiliares
function mostrarClienteyPreguntarBorrar($tel)
{
    $conexion = mysqli_connect("localhost", "jardinero", "jardinero") or exit("Error en conexión con servidor bd");
    mysqli_select_db($conexion, "jardineria")                         or exit("Error al seleccionar bd jardinería");
    if(!empty($tel)) {
        $consulta = mysqli_query($conexion, "SELECT * FROM clientes WHERE telefono='$tel';")
            or exit("Error al seleccionar cliente");
        // Si hubiese varios clientes con el mismo teléfono nos quedaríamos con el primero obtenido
        $fila = mysqli_fetch_assoc($consulta);
        if($fila == true) {
            print "<h2>FICHA DEL CLIENTE</h2><br><ul>";
            foreach($fila as $campo => $dato) {
                print "<li>$campo: $dato</li> ";
            }
            print "</ul><br>";
            print "<p>¿Quieres eliminar este cliente?</p>";
            ?>
			<form action='ejer7.php' method='get'>
				<input type="hidden" name="codigo" value='<?php $fila['CodigoCliente']; ?>'/>
				<input type="submit" name ="respuesta" value="Si"/>&nbsp;&nbsp;
				<input type="submit" name ="respuesta" value="No"/>
			</form>
			<?php
        } else {
            print "<p>El teléfono no pertenece a ningún cliente. <a href='ejer7.php'>VOLVER</a></p>";
        }
    } else {
        // Si el teléfono está vacío lo volvemos a pedir
        header("Location: ejer7.php"); // Redirección del navegador
    }
}

function borrarCliente($codigo, $respuesta)
{
    print "<p>RESULTADOS DE BORRADO DE CLIENTE DE CÓDIGO $codigo.</p>";

    if($respuesta == "Si") {
        include "conectabd.php";

        //Borrado de pagos del cliente
        mysqli_query($conexion, "DELETE FROM pagos WHERE codigoCliente = $codigo;")
            or exit("Error al borrar pagos del cliente.");
        print "Se han borrado los pagos del cliente.<br>";

        //Borrado de detallepedidos de los distintos pedidos que ha hecho el cliente
        $query = "DELETE FROM detallepedidos WHERE CodigoPedido IN (SELECT DISTINCT CodigoPedido FROM pedidos WHERE CodigoCliente = $codigo);";
        /* Y otra forma más de expresar este delete:
        $query= "DELETE DetallePedidos FROM DetallePedidos NATURAL JOIN Pedidos WHERE Pedidos.CodigoCliente = $codigo;"; */
        mysqli_query($conexion, $query) or exit("Fallo al eliminar los detalles pedidos del cliente $codigo.");
        print "Se han borrado los detalles de pedidos del cliente.<br>";

        //Borrado de pedidos del cliente
        mysqli_query($conexion, "DELETE FROM pedidos WHERE codigoCliente = $codigo;")
            or exit("Error al borrar pedidos del cliente.");
        print "Se han borrado los pedidos del cliente.<br>";

        //Borrado de cliente de la tabla clientes
        mysqli_query($conexion, "DELETE FROM clientes WHERE codigoCliente = $codigo;")
            or exit("Error al borrar cliente.");
        print "Se ha borrado el cliente de la tabla clientes.<br>";

        mysqli_close($conexion);
    } else {
        print "No se ha borrado el cliente.";
    }
    print "<p><a href='ejer7.php'>VOLVER</a></p>";
}
?>