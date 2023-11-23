<?php
session_start();
?>
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
            if(!isset($_REQUEST["entrar"])) {//si no establecido el botón enviar del formulario hacer esto
                ?>
                <form action="">
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" id=""><br><br>
                            <label for="">contraseña</label>
                            <input type="text" name="clave" id=""><br><br>
                            <input type="submit" value ="entrar" id="" name="entrar">
                </form>
                    <?php } else {//si lo está hacer esto
                        $nombre = $_REQUEST["nombre"];
                        $clave  = $_REQUEST["clave"];

                        $claveBBDD = "";

                        $conexion        = mysqli_connect("localhost", "root", "", "jardineria");
                        $sqlnombre       = "SELECT nombre, clave from usuarios where nombre = '$nombre'";
                        $consultaUsuario = mysqli_query($conexion, $sqlnombre);
                        $filasnombre     = mysqli_num_rows($consultaUsuario);
                        if(mysqli_num_rows($consultaUsuario) == 0) {//si devuelve 0 filas pedimos que se registre
                            print"<h2> EL usuario no está registrado</h2> <br><br> ";
                            print "<h3>Registrese <a href='register.php'>aquí</a></h3>";

                        } else {//si devuelve 1 fila
                            for($i = 0; $i < $filasnombre; $i++) {
                                $resultadonombre = mysqli_fetch_array($consultaUsuario);
                                $claveBBDD       = $resultadonombre["clave"];

                                if(password_verify($clave, $claveBBDD)) {//verificamos las contraseñas encriptadas con las pasadas por el formulario, si se cumple inicia sesión
                                    print"<h2>Has iniciado sesión correctamente $nombre</h2> <br><br> ";
                                    print "<h3>BIENVENID@ A LA SECCIÓN DE BASE DE DATOS</h3>";

                                    $_SESSION["usuario"]=$nombre;
                                } else {//si no se verifican correctamente pide rellenar de nuevo el formulario.
                                    print"<h2> Contraseña erronea</h2> <br><br> ";
                                    print "<h3>Volver al <a href='login.php'>formulario</a></h3>";
                                }

                            }

                        }
                        mysqli_close($conexion);
                    }

    ?>
        </div>
		</main>
        <?php include "../includes/aside2.php"; ?>
    </section>
    <?php include "../includes/footer2.php"; ?>
</body>
</html>