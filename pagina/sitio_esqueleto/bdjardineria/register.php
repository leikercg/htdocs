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
                if(!$_REQUEST) {//si no está establecido el array request mostrar formulario
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
                                $clave  = $_REQUEST["clave"]; //clave
                                $clave2 = $_REQUEST["clave2"]; //confirmación de clave

                                $conexion        = mysqli_connect("localhost", "root", "", "jardineria");
                                $sqlnombre       = "SELECT nombre from usuarios where nombre='$nombre'";
                                $consulta_nombre = mysqli_query($conexion, $sqlnombre);

                                if(mysqli_num_rows($consulta_nombre) == 1 && $clave != $clave2) {//entra si la cosulta devuelve una fila es por que está registrado ese usurario y si las contraseñas son distintas
                                    print"<h2> EL usuario ya está registrado y además as contraseñas no coinciden</h2> <br><br> ";
                                    print "<h3>volver al <a href='register.php'>formulario</a></h3>";
                                } elseif($clave != $clave2 || $clave =="") {//si las contraseñas son distintas o la contraseña esta en blanco

                                    print"<h2> Las contraseñas no coinciden o están en blanco</h2> <br><br> ";
                                    print "<h3>volver al <a href='register.php'>formulario</a></h3>";
                                } elseif(mysqli_num_rows($consulta_nombre) == 1) {// comprobar que no exista el usuario

                                    print"<h2> EL usuario ya está registrado.</h2> <br><br> ";
                                    print "<h3>volver al <a href='register.php'>formulario</a></h3>";

                                } elseif ($nombre==trim($nombre)){
                                    print"<h2> El campo usuario usuario está vacio.</h2> <br><br> ";
                                    print "<h3>volver al <a href='register.php'>formulario</a></h3>";
                                }
                                else {//si no se cumple nada de lo anterior se registrara el usuario.
                                    $clave_encriptada = password_hash($clave, PASSWORD_BCRYPT);
                                    $sqlRegistrar = "INSERT into usuarios (nombre,clave) values ('$nombre','$clave_encriptada')";
                                    $consulta_registrar = mysqli_query($conexion, $sqlRegistrar);

                                    print"<h2> EL usuario se ha creado correctamente.</h2> <br><br> ";
                                    print "<h3>Inicie sesión <a href='login.php'>aquí.</a></h3>";


                                }
                                mysqli_close($conexion);
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