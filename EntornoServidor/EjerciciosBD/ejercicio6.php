<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
     <header><h1>Modificar clientes</h1></header>
       <main>
        <section>
                 <?php
                 if(!$_REQUEST) {
                     print "<form action='ejercicio6.php'>
                    <label>Seleccciona el telefono del cliente</label>
                    <select name='telefono'>";

                     $conexion          = mysqli_connect("localhost", "root", "", "jardineria");
                     $sentencia         = "Select telefono, nombrecliente from clientes";
                     $resultadoconsulta = mysqli_query($conexion, $sentencia);
                     $nfilas            = mysqli_num_rows($resultadoconsulta);
                     if(mysqli_num_rows($resultadoconsulta) > 0) {
                         for($i = 0; $i < $nfilas; $i++) {
                             $resultado = mysqli_fetch_array($resultadoconsulta);
                             $telefono  = $resultado["telefono"];
                             $nombre    = $resultado["nombrecliente"];
                             print "<option value='$telefono'>" . $telefono . "--" . $nombre . "</option>";
                         }
                     }
                     print "</select>
                     <input type='submit' value='enviar'>
                 </form>";
                     mysqli_close($conexion);
                 } else {
                     if($_GET["fax"]) {
                         print "gola";
                     } else {

                         $telefono = $_REQUEST["telefono"];

                         $conexion          = mysqli_connect("localhost", "root", "", "jardineria");
                         $sentencia         = "Select codigocliente, nombrecliente, nombrecontacto, apellidocontacto,telefono,fax,lineadireccion1,lineadireccion2,ciudad,region,pais,codigopostal,limitecredito, codigoempleadorepventas from clientes where telefono =" . $telefono;
                         $resultadoconsulta = mysqli_query($conexion, $sentencia);

                         $nfilas = mysqli_num_rows($resultadoconsulta);
                         print "<form action='ejercicio6.php'>";
                         print "<table border ='1'>";

                         if(mysqli_num_rows($resultadoconsulta) > 0) {

                             for($i = 0; $i < $nfilas; $i++) {

                                 $resultado = mysqli_fetch_assoc($resultadoconsulta);
                                 foreach($resultado as $key => $value) {
                                     if($key == "codigoempleadorepventas") {
                                         print "<tr>";
                                         print "<td><label>Codigocliente</label></td>";
                                         print "<td><select name='telefono'>";
                                         $sentencia2         = "select distinct codigoempleadorepventas from clientes";
                                         $resultadoconsulta2 = mysqli_query($conexion, $sentencia2);
                                         $nfilas2            = mysqli_num_rows($resultadoconsulta2);
                                         for($j = 0; $j < $nfilas2; $j++) {
                                             $resultado2 = mysqli_fetch_assoc($resultadoconsulta2);
                                             foreach($resultado2 as $key2 => $value2) {
                                                 print "<option value='$value2'>$value2</option> ";
                                             }
                                         }
                                         print "</select></td>";
                                         print "</tr>";

                                     } elseif($key != "Codigocliente") {
                                         print "<tr>";
                                         print "<td><label>$key</label></td>
                                 <td><input type='text' name='$value'  value='$value' ></td>";
                                         print "</tr>";
                                     } else {
                                         print "<tr>";
                                         print "<td><label>$key</label></td>
                                 <td><input type='text' name='$value'  value='$value' readonly></td>";
                                         print "</tr>";

                                     }
                                 }

                             }
                             print "</table>";
                             print "<input type ='submit' value='modificar'>";
                             print "</form>";

                         }
                     }
                 }

                 ?>


    </main>



</body>
</html>