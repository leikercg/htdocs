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

        for($i = 0; $i < $nfilas1; $i++) {
            $resultado = mysqli_fetch_assoc($consulta1);
            foreach($resultado as $key => $value) {
                print"" . $key . "-->" . $value . "<br>";
            }

        }

        for($i = 0; $i < $nfilas2; $i++) {
            $resultado = mysqli_fetch_assoc($consulta2);
            foreach($resultado as $key => $value) {
                print"" . $key . "-->" . $value . "<br>";
            }

        }
        ?>
        <form action="">
            <label for="">Desea Borrar a este cliente de la base de datos?</label>
            <input type="submit" name="si" value="si">
            <input type="submit" name="si" value="no">
        </form>

        <?php

    }else{
        echo "Aqui mostrar que hacer si se borra o  mostrar link";
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