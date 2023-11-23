
<?php
session_start();
if(isset($_REQUEST["cerrar"])){
    unset($_SESSION["usuario"]);//usar unset para borrar varibales de sesión
}
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
            <?php
if (!isset($_SESSION["usuario"])) {
    ?>
		    <h2>Esta sección sólo puedes acceder si estás registrado</h2>
            <h3 >
                <a style="color:blue;" href="login.php">Iniciar sesión<a>
             </h3>
            <h3>
                <a style="color:blue;" href="register.php">Registrarse</a>
            <h3>

            <?php } else {
                print"<h2> Bien venid@ " . $_SESSION["usuario"] . "</h2> <br><br> ";
            }?>
		</main>
        <?php include "../includes/aside2.php"; ?>
    </section>
    <?php include "../includes/footer2.php"; ?>
</body>
</html>