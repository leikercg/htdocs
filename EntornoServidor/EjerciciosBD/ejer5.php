<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
if(!isset($_REQUEST["Insertar"])) {

    ?>
    <form action="ejer5.php">
        <label for="">Nombre del cliente</label>
        <input required type="text" name="nombreCliente" id=""><br><br>
        <label for="">Nombre de contacto</label>
        <input  required type="text" name="nombreContacto" id=""><br><br>
        <label  for="">Apellido de contacto</label>
        <input required type="text" name="apellidoContacto" id=""><br><br>
        <label for="">Telefono</label>
        <input required type="text" name="telefono" id=""><br><br>
        <label for="">Fax</label>
        <input  required type="text" name="fax" id=""><br><br>
        <label for="">Direccion 1</label>
        <input required type="text" name="direccion1" id=""><br><br>
        <label for="">Direccion 2</label>
        <input required type="text" name="direccion2" id=""><br><br>
        <label for="">Region</label>
        <input required type="text" name="region" id=""><br><br>
        <label for="">País</label>
        <input required type="text" name="pais" id=""><br><br>
        <label for="">Codigo postal</label>
        <input required type="text" name="codigoPostal" id=""><br><br>
        <label for="">Límite crédito</label>
        <input required type="number" name="limite" step="0.01" id=""><br><br>
        <label for="">ciudad</label>
            <input type="text" name="ciudad" id=""><br><br>
        <label for="">Codigo Empleado</label>
        <select name="codigoEmpleado">


            <?php
                    $conexion = mysqli_connect("localhost", "root", "", "jardineria");
    $sql                      = "SELECT codigoEmpleado from empleados";

    $consulta = mysqli_query($conexion, $sql);
    $nfilas   = mysqli_num_rows($consulta);

    for($i = 0; $i < $nfilas; $i++) {
        $resultado = mysqli_fetch_assoc($consulta);
        foreach ($resultado as $key => $value) {
            print"  <option value='$value'>$value</option>";
        }
    }
    mysqli_close($conexion);
    ?>
        </select>
        <br><br>
        <input type="submit" name="Insertar" id="">

    </form>
    <?php
}else{
    print_r($_REQUEST);
    $nombreCLiente=$_REQUEST["nombreCliente"];
    $nombreContacto=$_REQUEST["nombreContacto"];
    $apellidoContacto=$_REQUEST["apellidoContacto"];
    $telefono=$_REQUEST["telefono"];
    $fax=$_REQUEST["fax"];
    $direccion1=$_REQUEST["direccion1"];
    $direccion2=$_REQUEST["direccion2"];
    $region=$_REQUEST["region"];
    $pais=$_REQUEST["pais"];
    $codigopostal=$_REQUEST["codigoPostal"];
    $limite=$_REQUEST["limite"];
    $codigoEmpleado=$_REQUEST["codigoEmpleado"];
    $ciudad=$_REQUEST["ciudad"];

    $conexion=mysqli_connect("localhost","root","","jardineria");
    $consultaCodigo=mysqli_query($conexion,"SELECT max(Codigocliente) from clientes;");
    $nfilas=mysqli_num_rows($consultaCodigo);

    $resultadoCodigo=mysqli_fetch_array($consultaCodigo);
    $codigoCliente= $resultadoCodigo[0]+1;
    print"<br>$codigoCliente";

    $sql="INSERT INTO clientes (nombrecliente,nombrecontacto,apellidocontacto,telefono,fax,lineadireccion1,lineadireccion2,region,pais,codigopostal,limitecredito,codigoempleadorepventas,codigocliente, ciudad) values('$nombreCLiente','$nombreContacto','$apellidoContacto','$telefono','$fax','$direccion1','$direccion2','$region','$pais','$codigopostal','$limite','$codigoEmpleado','$codigoCliente','$ciudad')";

    if($consulta=mysqli_query($conexion,$sql)){
        print " se ha agregado el cliente con nombre: $nombreCLiente,contacto: $nombreContacto, apellido: $apellidoContacto, telefono: $telefono, fax: $fax, Direccion 1: $direccion1, Direccion 2: $direccion2, REgion: $region, Pais: $pais, CP: $codigopostal , Limite: $limite, CodigoEMpleado: $codigoEmpleado ";
    }






}

?>

</body>
</html>