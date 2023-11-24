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
				<a class="inicio" href="index.php">Inicio ejercicios BBDD</a><h2>MODIFICAR CLIENTE</h2>
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
                        if (!$_REQUEST) {
                            print "<form  action='ejer6.php' method='get'>";
                            print "Selecciona el telefono del cliente: &nbsp;";
                            print"<select name='codigocliente'>";

                            include "conectabd.php";

                            $consulta1      = "SELECT codigocliente, telefono, nombrecliente FROM clientes";
                            $resulconsulta1 = mysqli_query($conexion, $consulta1);

                            while ($registro = mysqli_fetch_row($resulconsulta1)) {
                                print"<option value=$registro[0]>" . $registro[1] . "--" . $registro[2] . "</option>";
                            }
                            print"</select><br><br>";
                            print "<input type='submit' value='Enviar consulta' name='enviar'>";
                            print "</form>";
                        } else {
                            if(!isset($_REQUEST["modificar"])) {
                                $codigocliente = $_REQUEST['codigocliente'];

                                include "conectabd.php";

                                $consulta2      = "SELECT * FROM clientes where codigocliente='$codigocliente' ";
                                $resulconsulta2 = mysqli_query($conexion, $consulta2);
                                $registro       = mysqli_fetch_row($resulconsulta2);

                                //Se puede almacenar en distintas variables cada uno de los registros del cliente elegido por el usuario
                                /*
                                $nombrecliente=$registro[1];
                                $nombrecontacto=$registro[2];
                                $apellidocontacto=$registro[3];
                                $telefono=$registro[4];
                                $fax=$registro[5];
                                $lineadireccion1=$registro[6];
                                $lineadireccion2=$registro[7];
                                $ciudad=$registro[8];
                                $region=$registro[9];
                                $pais=$registro[10];
                                $codigopostal=$registro[11];
                                $codigoempleadorepventas=$registro[12];
                                $limitecredito=$registro[13];*/
                                ?>

		<table>
		<form  action='ejer6.php' method='GET'>
		<tr>
			<td>CodigoCliente:</td>
			<td><input class='readonly' type='text' name='codigocliente' value='<?php print "$codigocliente"; ?>' maxlength='50'size='50' readonly></td>
		</tr>
		<tr>
			<td>NombreCliente:</td>
			<td><input type='text' name='nombrecliente' value='<?php print $registro[1]; ?>' maxlength='50'size='50' required></td>
		</tr>
		<tr>
			<td>NombreContacto:</td>
			<td><input type='text' name='nombrecontacto' value='<?php print $registro[2]; ?>' maxlength='50'size='50'></td>
		</tr>
		<tr>
			<td>ApellidoContacto</td>
			<td><input type='text' name='apellidocontacto' value='<?php print $registro[3]; ?>' maxlength='30'size='50'></td>
		</tr>
		<tr>
			<td>Telefono:</td>
			<td><input type='text' name='telefono' value='<?php print $registro[4]; ?>' maxlength='15'size='50' pattern="[0-9]{9,11}" required></td>
		</tr>
		<tr>
			<td>Fax:</td>
			<td><input type='text' name='fax' value='<?php print $registro[5]; ?>' maxlength='15' size='50' pattern="[0-9]{9,11}" required></td>
		</tr>
		<tr>
			<td>LineaDireccion1:</td>
			<td><input type='text' name='lineadireccion1' value='<?php print $registro[6]; ?>' maxlength='50' size='50' required></td>
		</tr>
		<tr>
			<td>LineaDireccion2:</td>
			<td><input type='text' name='lineadireccion2' value='<?php print $registro[7]; ?>' maxlength='50' size='50'></td>
		</tr>
		<tr>
			<td>Ciudad:</td>
			<td><input type='text' name='ciudad' value='<?php print $registro[8]; ?>' maxlength='50' size='50' required></td>
		</tr>
		<tr>
			<td>Region:</td>
			<td><input type='text' name='region' value='<?php print $registro[9]; ?>' maxlength='50' size='50'></td>
		</tr>
		<tr>
			<td>Pais:</td>
			<td><input type='text' name='pais' value='<?php print $registro[10]; ?>' maxlength='50' size='50'></td>
		</tr>
		<tr>
			<td>CodigoPostal:</td>
			<td><input type='text' name='codigopostal'  value='<?php print $registro[11]; ?>' maxlength='10' size='50' pattern="[0-9]{4,5}"></td>
		</tr>
		<tr>
			<td>CodigoEmpleadoRepventas:</td>
			<td> <?php	print "<select name = 'codigoempleadorepventas'>";

                                $consulta = "SELECT CodigoEmpleado, Nombre, Apellido1, Apellido2 FROM empleados";
                                $rescon   = mysqli_query($conexion, $consulta);

                                while($valor = mysqli_fetch_row($rescon)) {
                                    print "<option ";
                                    if($valor[0] == $registro[12]) {
                                        print "selected ";
                                    } //Para que aparezca seleccionado por defecto el empleado asignado al cliente
                                    print "value = $valor[0]>" . $valor[1] . " " . $valor[2] . " " . $valor[3] . "</option>";
                                }
                                mysqli_close($conexion);
                                print "</select>";
                                ?>
			</td>
		</tr>
		<tr>
			<td>LimiteCredito:</td>
			<td><input  type="number" name='limitecredito' value='<?php print $registro[13]; ?>' maxlength='15' size=50 step="0.01" min="0" max="10000" required></td>
		</tr>
		<tr>
			<td><input type="submit" value="Modificar cliente" name="modificar"></td>
			<td><a href='ejer6.php'>Vuelve al listado de clientes</a></td>
		</tr>

		</form>
		</table>
<?php
                            } else {
                                $codigocliente           = $_REQUEST['codigocliente'];
                                $nombrecliente           = $_REQUEST['nombrecliente'];
                                $nombrecontacto          = $_REQUEST['nombrecontacto'];
                                $apellidocontacto        = $_REQUEST['apellidocontacto'];
                                $telefono                = $_REQUEST['telefono'];
                                $fax                     = $_REQUEST['fax'];
                                $lineadireccion1         = $_REQUEST['lineadireccion1'];
                                $lineadireccion2         = $_REQUEST['lineadireccion2'];
                                $ciudad                  = $_REQUEST['ciudad'];
                                $region                  = $_REQUEST['region'];
                                $pais                    = $_REQUEST['pais'];
                                $codigopostal            = $_REQUEST['codigopostal'];
                                $codigoempleadorepventas = $_REQUEST['codigoempleadorepventas'];
                                $limitecredito           = $_REQUEST['limitecredito'];

                                include "conectabd.php";

                                print "<b>Se procede a la modificación del cliente con código $codigocliente</b><br>";
                                $modificacion = "UPDATE clientes SET nombrecliente='$nombrecliente', nombrecontacto='$nombrecontacto', apellidocontacto='$apellidocontacto', telefono='$telefono', fax='$fax', lineadireccion1='$lineadireccion1', lineadireccion2='$lineadireccion2', ciudad='$ciudad', region='$region', pais='$pais', codigopostal='$codigopostal', codigoempleadorepventas='$codigoempleadorepventas', limitecredito='$limitecredito' WHERE codigocliente = '$codigocliente'";

                                print "<b>Sentencia de modificación:</b><br>$modificacion<br>";
                                if(mysqli_query($conexion, $modificacion)) {	//Devuelve true si se ha podido realizar la consulta y a la vez la ejecuta
                                    print "<br><b>Inserción completada correctamente.</b><br><br>";
                                } else {
                                    print "<br><b>Ha ocurrido error al ejecutar sentencia SQL INSERT.</b><br/>";
                                }
                                print "<a href = 'ejer6.php'>Vuelta al formulario de inserción</a><br/>";
                                mysqli_close($conexion);
                            }
                        }
                    }?>


        </div>
		</main>
        <?php include "../includes/aside2.php"; ?>
    </section>
    <?php include "../includes/footer2.php"; ?>
</body>
</html>