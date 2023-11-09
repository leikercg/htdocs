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

                <option value=""></option>
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
                     $telefono = $_REQUEST["telefono"];

                     $conexion          = mysqli_connect("localhost", "root", "", "jardineria");
                     $sentencia         = "Select Codigocliente, nombrecliente, nombrecontacto, apellidocontacto,telefono,fax,lineadireccion1,lineadireccion2,ciudad,region,pais,codigopostal,codigoempleadorepventas,limitecredito from clientes where telefono = $telefono";
                     $resultadoconsulta = mysqli_query($conexion, $sentencia);

                     $nfilas = mysqli_num_rows($resultadoconsulta);
                     print "<form action='ejercicio.php'>";
                     print "<table border ='1'>";

                     if(mysqli_num_rows($resultadoconsulta) > 0) {

                         for($i = 0; $i < $nfilas; $i++) {

                             $resultado = mysqli_fetch_assoc($resultadoconsulta);
                             foreach($resultado as $key => $value) {
                                 if($key != "Codigocliente") {
                                     print "<tr>";
                                     print "<td><label>$key</label></td>
                                 <td><input type='text' name='$value'  value='$value' disabled></td>";
                                     print "</tr>";
                                 } else {
                                     print "<tr>";
                                     print "<td><label>$key</label></td>
                                 <td><input type='text' name='$value'  value='$value'></td>";
                                     print "</tr>";

                                 }
                             }

                         }
                         print "</table>";
                         print "<input type ='submit' value='modificar cliente'>";
                         print "</form>";

                     }
                 }

                 ?>

         <?php

                 ?>

    </main>



</body>
</html>