<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header><h1>Borrar clientes</h1></header>
    <main>
       <?php
if($_REQUEST) {
    if(isset($_REQUEST["dato"])) {
        $dato = $_REQUEST["dato"];

        $conexion   = mysqli_connect("localhost", "root", "", "jardineria") or exit("no se pudo conectar al servidor o a la base de datos");
        $sentencia1 = "Select * from clientes where telefono ='$dato'";
        $sentencia2 = "Select * from clientes where nombrecliente ='$dato'"; //no devuelve error, lo que pasa es que devuelve 0 valores una de los dos

        $consulta1 = mysqli_query($conexion, $sentencia1);
        $nfilas1   = mysqli_num_rows($consulta1); //////por telefono

        $consulta2 = mysqli_query($conexion, $sentencia2); ////por nombre
        $nfilas2   = mysqli_num_rows($consulta2);

        print "<form action=''>";
        $clinteid = "";
        for($i = 0; $i < $nfilas1; $i++) {
            $resultado = mysqli_fetch_assoc($consulta1);
            foreach($resultado as $key => $value) {
                print"" . $key . "-->" . $value . "<br>";
                if($key == "CodigoCliente") {
                    $clinteid = $value;
                }
            }

        }

        for($i = 0; $i < $nfilas2; $i++) {
            $resultado = mysqli_fetch_assoc($consulta2);
            foreach($resultado as $key => $value) {
                print"" . $key . "-->" . $value . "<br>";
                print "<input type='text' name='$key' hidden value='$value'>";
            }
        }

        print "<input type='text' name='codigo' hidden value='$clinteid'>
            <label>Desea Borrar a este cliente de la base de datos?</label>
            <input type='submit' name='si' value='si'>
            <input type='submit' name='si' value='no'>
        </form>";

        mysqli_close($conexion);

    } else {
        print_r($_REQUEST);
        $codigo = $_REQUEST["CodigoCliente"];
        if($_REQUEST["si"] == "si") {
            $conexion   = mysqli_connect("localhost", "root", "", "jardineria") or exit("no se pudo conectar al servidor o a la base de datos");

            $consulta1 = mysqli_query($conexion, "delete from pagos where codigocliente =$codigo") or exit("no se pudo borrar el campo");
            $consulta1 = mysqli_query($conexion, "delete from detallepedidos where codigocliente =$codigo") or exit("no se pudo borrar el campo");
            $consulta1 = mysqli_query($conexion, "delete from pedidos where codigocliente =$codigo") or exit("no se pudo borrar el campo");
            $consulta1 = mysqli_query($conexion, "delete from clientes where codigocliente =$codigo") or exit("no se pudo borrar el campo");
            print
            "<h2>Se han borrado los datos del cliente con codigo $codigo";
        }else{
            print
            "<h2>no se borro el usuario";
        }

    }
} else {

    ?>
            <h2>Formulario de borrado</h2>
            <form action="">
                <label for="">Introduce el numero o telefono</label><br>
                <input type="text" name="dato" id=""><br>
                <input type="submit">
            </form>

       <?php
}
       ?>
    </main>


</body>
</html>