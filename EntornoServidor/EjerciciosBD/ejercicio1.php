<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>clientes</h1>
    </header>
    <?php
        $conexion = mysqli_connect("localhost", "root", "") or die("No se puede conectar con el servidor <br>");

    mysqli_select_db($conexion, "jardineria") or die("No se pude conectar con la base de datos");

    $resultconsulta = mysqli_query($conexion, "Select codigocliente, nombrecliente, nombrecontacto from clientes;");

    if(mysqli_query($conexion, "Select codigocliente, nombrecliente, nombrecontacto from clientes;")) {
        print "Se ha ejecutado correctamente la sentencia <br>";
    } else {
        print "No se ejecuta correctamente la sentencia <br>";
    }

    $nfilas = mysqli_num_rows($resultconsulta); //devuelveel numero de filas de la consulta

    print $nfilas . " filas encontradas <br>";

    if($nfilas > 0) {
        print "<TABLE border='1'>";
        print "<TR>";
        print "<TH>Codigo</TH>";
        print "<TH>Nombre</TH>";
        print "<TH>Nombre de contacto</TH>";
        print "</TR>";

        for($i = 0; $i < $nfilas; $i++) {
            // $resultado = mysqli_fetch_row($resulconsulta);
            $resultado = mysqli_fetch_array($resultconsulta); // tiene que estar dentro, por que devuelve el primer valor, dentro devuelve el valor siguiente.

            print "<TR>";
            print "<TD>" . $resultado["codigocliente"] . "</TD>"; //hay que poner los mismos campos que se han escrito en la consulta, incluso las mayusculas
            print "<TD>" . $resultado["nombrecliente"] . "</TD>";
            print "<TD>" . $resultado["nombrecontacto"] . "</TD>";
            print "</TD>";
            print "</TR>";

        }
        print "</TABLE>";

        print "<br><br> con blucle aninado foreach";

        print "<TABLE border='1'>";
        print "<TR>";
        print "<TH>Codigo</TH>";
        print "<TH>Nombre</TH>";
        print "<TH>Nombre de contacto</TH>";
        print "</TR>";
        $resultconsulta = mysqli_query($conexion, "Select codigocliente, nombrecliente, nombrecontacto from clientes;"); // para recorrerlo dos veces hay que reiniciarlo

        for($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_assoc($resultconsulta); //deveulve false si se ha recorrido ya, o no tiene filas
        print "<tr>";
            foreach($resultado as $value) {
                print "<td>$value</td>";
            }
        print "</tr>";

        }
        print "</TABLE>";
    }
    ?>

</body>
</html>