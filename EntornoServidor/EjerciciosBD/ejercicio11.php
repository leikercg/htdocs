<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>LISTA DE CLIENTES</header>
    <h2>Identificación de usuarios</h2>
    <?php
if(!$_REQUEST) {
    ?>
    <h2>Está zona es restringida, debe registrase para acceder al contenido</h2>
    <form action="">
        <label for="">Usuario: </label>
        <input type="text" name="usuario" id=""><br><br>
        <label for="">Clave</label>
        <input type="text" name="clave" id=""><br>
        <input type="submit" value="Entrar" id="">
    </form>
         <?php } else {?>

    <?php
        extract($_REQUEST);
             $conexion           = mysqli_connect("localhost", "root", "", "jardineria");
             $consulta_verificar = mysqli_query($conexion, "SELECT nombre, clave from usuarios where nombre='$usuario'");
             $nfilas             = mysqli_num_rows($consulta_verificar);

             $claveveri="";
             $usuarioveri="";//claves extraidas de la base de datos
             $resultado   = mysqli_fetch_row($consulta_verificar);
             for($i = 0; $i < $nfilas; $i++) {
                 $claveveri   = $resultado[1];

                 $usuarioveri = $resultado[0];
             }

             if($claveveri == $clave && $usuarioveri == $usuario) {
                 $resultconsulta = mysqli_query($conexion, "Select codigocliente, nombrecliente, nombrecontacto from clientes;");

                 $nfilas2=mysqli_num_rows($resultconsulta);

                 print "<TABLE border='1'>";
                 print "<TR>";
                 print "<TH>Codigo</TH>";
                 print "<TH>Nombre</TH>";
                 print "<TH>Nombre de contacto</TH>";
                 print "</TR>";

                 for($i = 0; $i < $nfilas2; $i++) {
                     // $resultado = mysqli_fetch_row($resulconsulta);
                     $resultado1 = mysqli_fetch_array($resultconsulta); // tiene que estar dentro, por que devuelve el primer valor, dentro devuelve el valor siguiente.

                     print "<TR>";
                     print "<TD>" . $resultado1["codigocliente"] . "</TD>"; //hay que poner los mismos campos que se han escrito en la consulta, incluso las mayusculas
                     print "<TD>" . $resultado1["nombrecliente"] . "</TD>";
                     print "<TD>" . $resultado1["nombrecontacto"] . "</TD>";
                     print "</TD>";
                     print "</TR>";

                 }
                 $nfilas = mysqli_num_rows($resultconsulta); //devuelveel numero de filas de la consulta

             } else {
                 print "<h2>Datos erroneos>";
                 print"<a href='ejercicio11.php'>Volver a ingresar datos</a>";
             }

         }
    ?>

</body>
</html>