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
				<a class="inicio" href="index.php">Inicio ejercicios BBDD</a><h2>IMPORTE PEDIDOS CLIENTE</h2>
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
                        //Versión con importes

                        //Conectamos con bd jardineria
                        include "conectabd.php";

                        if (isset($_REQUEST['enviar'])) {  //Se ha recibido código y nombre del cliente y se procede a obtener y mostrar información de sus pedidos
                            $menu = $_REQUEST['menu'];
                            //1º Mostramos encabezado con el nombre del cliente y su código:
                            $datoscli  = explode(":", $menu);
                            $codigocli = $datoscli[0];
                            $nombrecli = $datoscli[1];
                            print "<h1>LISTADO DE PEDIDOS DEL CLIENTE $nombrecli <br>CON CÓDIGO  $codigocli</h1><br>";

                            //2º Buscamos los pedidos del cliente cuyo código se ha enviado desde el formulario
                            $sql1                 = "SELECT CodigoPedido, FechaPedido FROM pedidos WHERE pedidos.CodigoCliente='$codigocli' ";
                            $resulconsultapedidos = mysqli_query($conexion, $sql1) or exit("Fallo en la consulta de pedidos");

                            //3º Para cada pedido mostramos sus datos y luego buscamos sus líneas de detalle
                            // y el nombre de cada producto, devolviéndolo todo en una tabla HTML
                            $npedidos = mysqli_num_rows($resulconsultapedidos);
                            if($npedidos == 0) {
                                print "<h1>ESTE CLIENTE NO TIENE REGISTRADO NINGÚN PEDIDO </h1>";
                            } else {
                                $imp_total = 0;
                                for($fp = 1; $fp <= $npedidos; $fp++) {
                                    $imp_pedido = 0;
                                    $filapedido = mysqli_fetch_row($resulconsultapedidos);
                                    print "<table>";
                                    print "<tr>
					<th colspan='4'>Pedido código " . $filapedido[0] . " de fecha " . $filapedido[1] . "</th>
				</tr>";
                                    print "<tr>
					<th>Nombre del Producto</th>
					<th>Precio Unidad</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>";

                                    //Obtenemos todos los detallepedidos y nombres de productos del pedido de código $filapedido[0]
                                    // y los devolvemos en forma de tabla HTML
                                    $sql2                        = "SELECT Nombre,PrecioUnidad,Cantidad FROM detallepedidos NATURAL JOIN productos WHERE detallepedidos.CodigoPedido=$filapedido[0]";
                                    $resulconsultadetallespedido = mysqli_query($conexion, $sql2) or exit("Fallo en la consulta de detallepedidos y productos");
                                    $ndetalles                   = mysqli_num_rows($resulconsultadetallespedido);

                                    if ($ndetalles == 0) {
                                        print "<tr>
						<td colspan='4'>No se han registrado detalles de este pedido</td>
					</tr>";
                                    } else {
                                        for($fd = 1; $fd <= $ndetalles; $fd++) {
                                            $filadetalle = mysqli_fetch_row($resulconsultadetallespedido);
                                            print '<tr>';
                                            foreach($filadetalle as $columna) {
                                                echo '<td>',$columna,'</td>';
                                            }
                                            //Además vamos calculando y acumulando el importe de cada detalle del pedido actual
                                            $imp_detalle = $filadetalle[1] * $filadetalle[2];
                                            $imp_pedido += $imp_detalle;
                                            echo '<td>',$imp_detalle,'</td>';
                                            print '</tr>';
                                        }
                                    }
                                    print "<tr>
					<td colspan='3'>Importe total de este pedido</td>
					<td>$imp_pedido</td>
				</tr>";
                                    print "</table> <br/>";
                                    $imp_total += $imp_pedido; //Vamos acumlando los importe de los pedidos del cliente, para después poder mostrarlo
                                }
                                print "<h2>IMPORTE TOTAL DE PEDIDOS DEL CLIENTE:  $imp_total</h2><br>";
                            }
                        }

                        //Sacamos menu de selección para elegir el cliente
                        $consulta = mysqli_query($conexion, "select CodigoCliente,NombreCliente from clientes") or exit("Fallo en la consulta");
                        $nfilas   = mysqli_num_rows($consulta);
                        print "<h1>Selecciona cliente a consultar</h1><br>";
                        print "<form  action='ejer9.php' method='get'>";
                        print "<select name='menu'>";
                        for($f = 1; $f <= $nfilas; $f++) {
                            $fila     = mysqli_fetch_row($consulta);
                            $datoscli = $fila[0] . ':' . $fila[1];		//Forma de pasar dos datos en un mismo value y recuperarlos con explode
                            print "<option value='$datoscli'>";
                            print $fila[1];
                            print "</option>";
                        }
                        print "</select>&nbsp;&nbsp;";
                        print "<input type='submit' name='enviar' value='Enviar consulta'>";
                        print "</form>";
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
