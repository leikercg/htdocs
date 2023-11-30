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
        <h1>Repaso 1ª evaluación</h1>
    </header>
    <section>
        <nav></nav>

        <div class="inicio"><button><a href="main.php">Inicio</a></button></div>
        <main>
            <div class="fecha">
            <?php
                $fecha = date("d-m-Y");
                print "Fecha: ".$fecha;
            ?>
        </div>

        <?php
            if(!$_REQUEST) {
                ?>

            <h1>Ejercicio 3</h1>
            <div class="tituloForm"><h2>Consulta de productos por proveedor</h2></div>
            <div class="contenedorForm">
            <form action="">
                <label for="">Seeleccione un proveedor</label>
                <select name="proveedor" id="">
                    <option value=""></option>
                    <?php
                                $conexion = mysqli_connect("localhost", "root", "", "jardineria");

                $sql      = "SELECT distinct proveedor from productos order by Proveedor";
                $consulta = mysqli_query($conexion, $sql);
                $nfilas   = mysqli_num_rows($consulta);
                if ($nfilas > 0) {
                    for ($i = 0; $i < $nfilas; $i++) {
                        $resultado = mysqli_fetch_array($consulta);
                        print "<option value='" . $resultado[0] . "'>" . $resultado[0] . "</option>";
                    }
                }
                mysqli_close($conexion);
                ?>
                </select>

                <input class="boton"type="submit" name="" id="">
            </form>
            </div>
            <?php
            } else {
                $proveedor=$_REQUEST["proveedor"];
                $conexion=mysqli_connect("localhost","root","","jardineria");
                $sql="SELECT CodigoProducto, Nombre, Gama, Dimensiones, CantidadenStock, PrecioProveedor from productos where proveedor='".$_REQUEST["proveedor"]."'";
                $consulta=mysqli_query($conexion,$sql);
                $nfilas=mysqli_num_rows($consulta);
                if($nfilas>0){
                    for ($i=0; $i < $nfilas ; $i++) {
                        $resultado=mysqli_fetch_assoc($consulta);
                        foreach ($resultado as $key => $value) {
                            print $key ." ".$value ;
                        }print "<br>";

                    }
                }

            }
        ?>
		</main>
		<aside></aside>
	</section>
	<footer></footer>


</body>
</html>