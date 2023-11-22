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
				<a class="inicio" href="index.php">Inicio ejercicios BBDD</a><h2>REGISTRASE</h2>

                <?php
                if(!$_REQUEST) {
                    ?>
                        <form action="">
                                    <label for="">Nombre</label>
                                    <input type="text" name="nombre" id=""><br><br>
                                    <label for="">contraseña</label>
                                    <input type="text" name="clave" id=""><br><br>
                                    <label for="">Repite contraseña</label>
                                    <input type="text" name="clave2" id=""><br><br>
                                    <input type="submit" value ="registrase" id="">
                        </form>
                            <?php } else {
                                $nombre = $_REQUEST["nombre"];
                                $clave  = $_REQUEST["clave"];
                                $clave2 = $_REQUEST["clave2"];

                                if($clave != $clave2) {
                                    print"<h2> Las contraseñas no coinciden</h2> <br><br> ";
                                    print "<h3>volver al <a href=''>formulario</a></h3>";
                                } else {
/*comprobar que no exista el usuario*/
                                    $clave_encriptada = password_hash($clave, PASSWORD_BCRYPT);
                                    print $clave_encriptada;

                                    if(!password_verify($nombre, $clave_encriptada)) {
                                        print"<h3>Las contraseña no co";
                                    }
                                }

                            }

    ?>

			</div>
		</div>

        <div class="contenido">

        </div>
		</main>
        <?php include "../includes/aside2.php"; ?>
    </section>
    <?php include "../includes/footer2.php"; ?>
</body>
</html>