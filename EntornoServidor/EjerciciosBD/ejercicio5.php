<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header><h1>Insertar Clientes</h1></header>
    <main>
        <?php
        if($_REQUEST) {// recogo los valores del formulario
            $nombrecliente  = $_REQUEST["nombrecliente"];
            $nombrecontacto = $_REQUEST["nombrecontacto"];
            $apellido       = $_REQUEST["apellido"];
            $telefono       = $_REQUEST["telefono"];
            $fax            = $_REQUEST["fax"];
            $direccion1     = $_REQUEST["direccion1"];
            $direccion2     = $_REQUEST["direccion2"];
            $ciudad         = $_REQUEST["ciudad"];
            $region         = $_REQUEST["region"];
            $pais           = $_REQUEST["pais"];
            $codigopostal   = $_REQUEST["codigopostal"];
            $limite         = $_REQUEST["limite"];
            $codigoempleado = $_REQUEST["codigoempleado"];

            $conexion = mysqli_connect("localhost", "root", "", "jardineria"); // me conecto al servidor y la BD

            $sentencia = "select max(codigocliente)from clientes";
            $codigo    = 0;
            $consulta  = mysqli_query($conexion, $sentencia);
            $nfilas    = mysqli_num_rows($consulta); // calculo el ultimo numero asignado para darle +1
            if($nfilas > 0) {
                for($i = 0; $i < $nfilas; $i++) {
                    $resultado = mysqli_fetch_assoc($consulta);
                    foreach ($resultado as $key => $value) {
                        $codigo = $value + 1;
                    }
                }
            }

            $sentenciaInsert = "insert into clientes(codigocliente, nombrecliente, nombrecontacto, apellidocontacto,telefono,fax,lineadireccion1,lineadireccion2,ciudad,region,pais,codigopostal,codigoempleadorepventas,limitecredito) values('$codigo','$nombrecliente','$nombrecontacto','$apellido','$telefono','$fax','$direccion1','$direccion2','$ciudad','$region','$pais','$codigopostal','$codigoempleado','$limite')";

            $consulta = mysqli_query($conexion, $sentenciaInsert);
            if($consulta) {
                print "<h2>Se ha agregado correctamente un nuevo cliente con codigo $codigo </h2>
                <h2> con la sentencia $sentenciaInsert </h2>";
            } else {
                print "<h2>Algo salio mal </h2>";
            }
            print "<a href='ejercicio5.php'>insertar otro cliente</a>";
            mysqli_close($conexion);
        } else {

            ?>
    </main>
            <h2>Formulario para inserccion de clientes</h2>
    <form action="ejercicio5.php">
        <table border="1">
            <tr>
                <td><label >Nombre del cliente</label></td>
                <td><input required type="text" name="nombrecliente" ></td>
            </tr><tr>
                <td><label for="">Nombre del contacto</label></td>
                <td><input required type="text" name="nombrecontacto" id=""></td>
            </tr>
            <tr>
                <td><label >Apellido del cliente</label></td>
                <td><input required type="text" name="apellido" id=""></td>
            </tr>
            <tr>
                <td><label for="">telefono</label></td>
                <td><input required type="text" name="telefono" id=""></td>
            </tr>
            <tr>
                <td><label for="fax">Fax</label></td>
                <td><input required type="text" name="fax" id=""></td>
            </tr>
            <tr>
                <td><label for="">Direccion 1</label></td>
                <td><input required type="text" name="direccion1" id=""></td>
            </tr>
            <tr>
                <td> <label for="">Direccion2</label></td>
                <td><input required type="text" name="direccion2" id=""></td>
            </tr>
            <tr>
                <td><label for="">Ciudad</label></td>
                <td><input required type="text" name="ciudad" id=""></td>
            </tr>
            <tr>
                <td><label for="">Region</label></td>
                <td><input required type="text" name="region" id=""></td>
            </tr>
            <tr>
                <td> <label for="">País</label></td>
                <td><input required type="text" name="pais" id=""></td>
            </tr>
            <tr>
                <td><label for="">Código Postal</label></td>
                <td><input required type="text" name="codigopostal" id=""></td>
            </tr>
            <tr>
                <td><label for="">Límite Crédito</label></td>
                <td><input required type="number" step="0.1" name="limite" id=""></td>
            </tr>
            <tr>
                <td><label for="">Código Empleado</label></td>
                <td><select name="codigoempleado" id="">
                <?php
                        $conexion = mysqli_connect("localhost", "root", "", "jardineria");
            $consulta             = "select distinct codigoempleadorepventas from clientes";
            $resultadoconsulta    = mysqli_query($conexion, $consulta);
            $nfilas               = mysqli_num_rows($resultadoconsulta);
            if($nfilas > 0) {
                for($i = 0; $i < $nfilas; $i++) {
                    $resultado = mysqli_fetch_assoc($resultadoconsulta);
                    foreach($resultado as $key => $value) {
                        print "<option value=' . $value . '>$value</option>";
                    }
                }
            }
            ?> </select>
                </td>

            </tr>

        </table>
        <input type="submit" value="enviar" id="">
    </form>

    <?php
        }
        ?>

</body>
</html>