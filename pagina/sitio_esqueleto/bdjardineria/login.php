<!DOCTYPE html>
<html lang="en">
    <?php include "../includes/metadata2.php"; ?>
<body>
    <?php include "../includes/header2.php"; ?>
    <?php include "../includes/menu2.php"; ?>

    <section>
        <?php include "../includes/nav_bbdd.php"; ?>

        <main>
        <div class="fijo">
			<div>
				<a class="inicio" href="index.php">Inicio ejercicios BBDD</a><h2>Iniciar sesión</h2>
			</div>
		</div>

        <div class="contenido">
            <?php
            if(!$_REQUEST){
            ?>
                <form action="">
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" id=""><br><br>
                            <label for="">contraseña</label>
                            <input type="text" name="clave" id=""><br><br>
                            <input type="submit" value ="enviar" id="">
                </form>
                    <?php }else{
                        print_r($_REQUEST);
                         $nombre=$_REQUEST["nombre"];
                         $clave=$_REQUEST["clave"];

                         $conexion=mysqli_connect("localhost","root","","jardineria");

                         $sqlnombre="SELECT nombre from usuarios where clave = '$clave' ";

                         $consultanombre = mysqli_query($conexion, $sqlnombre);

                         $filasnombre = mysqli_num_rows($consultanombre);

                         for($i= 0;$i<$filasnombre;$i++){
                        $resultadonombre=mysqli_fetch_array($consultanombre);
                        print $resultadonombre["nombre"];
                        }

                    }




            ?>
        </div>
		</main>
        <?php include "../includes/aside2.php"; ?>
    </section>
    <?php include "../includes/footer2.php"; ?>
</body>
</html>