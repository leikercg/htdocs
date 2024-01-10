<?php
include "Menu.php";
session_start();
if(isset($_REQUEST["borrarMenu"])) {
    unset($_SESSION["miMenu"]);
}
print_r($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0px;
        }
        html,body{
            margin: 0px;
            padding: 0px;
            width: 100vw;
            height: 100vh;
        }
        header{
            height: 20%;
            width: 100%;
            background-color: blanchedalmond;
            text-align: center
        }
        section{
            height: ;
        }
        main{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

    </style>
</head>
<body>
    <header><h1>Menús</h1></header>
    <section>
        <aside></aside>
        <main>
            <?php
                if(!isset($_SESSION["miMenu"])) {/*si no esta establecido el menu*/
                    if(!$_REQUEST || isset($_REQUEST["borrarMenu"])) {
                        ?>
        <form action="ejercicio2V1.php">
            <label for="">Indicar dia de la semana</label>
            <input type="text" name="dia" id=""><br><br>
            <input type="submit" name="enviar" value="enviar" id="">
        </form>
            <?php
                    } elseif(isset($_REQUEST["enviar"])) {
                        $dia                = $_REQUEST["dia"];
                        $fecha              = date("d-m-Y");
                        $miMenu             = new Menu($dia, $fecha);
                        $_SESSION["miMenu"] = $miMenu;

                    }
                }
                if(isset($_SESSION["miMenu"])) {/*si esto fuera un elseif no se ejecutaria por que al cumplirse el if anterior no entra en este bucle*/
                    if(!isset($_REQUEST["agregar"])) {
                        ?>
            <form action="ejercicio2V1.php">
                <label for="plato">Nombre del plato</label>
                <input type="text" name="plato" id="plato" required><br><br>
                <label for="">Elige el tipo de plato</label><br><br>
                <input type="radio" name="lugar" value="primero" checked>Primer plato <br><br>
                <input type="radio" name="lugar" value="segundo" id="" >Segundo plato <br><br>
                <input type="radio" name="lugar" value="postre" id="">Postre <br><br>
                <input type="submit" name="agregar" id="" value="Agregar plato">
            </form>
        <?php
                    } else {
                        $plato = $_REQUEST["plato"];
                        $lugar = $_REQUEST["lugar"];
                        print "<h3>Plato: {$_REQUEST["plato"]}. <br>
                        Agregado a: {$_REQUEST["lugar"]}.</h3><br>";

                        if($lugar == "primero") {
                            $_SESSION["miMenu"]->AgregarPrimer($plato);
                        }
                        if($lugar == "segundo") {
                            $_SESSION["miMenu"]->AgregarSegundo($plato);
                        }
                        if($lugar == "postre") {
                            $_SESSION["miMenu"]->AgregarPostre($plato);
                        }

                        $_SESSION["miMenu"]->MostrarMenu();
                        print " <br><form action='ejercicio2V1.php'>
                        <input type='submit' name='otro' value='Agregar otro plato'>
                        <input type='submit' name='borrarMenu' value='borrarMenu'>

                        </form>";

                        print"<br> este menu es para el {$_SESSION["miMenu"]->getDia()} y fue creado en la fecha {$_SESSION["miMenu"]->getFecha()} ";
                    }

                }

?>

        </main>

        <nav></nav>
    </section>
    <footer></footer>



</body>
</html>