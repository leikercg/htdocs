<?php
include "Menu.php";
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
        }
        section{
            height: ;
        }
    </style>
</head>
<body>
    <header><h1>Menús</h1></header>
    <section>
        <aside></aside>
        <main>
            <?php
                if(!$_REQUEST) {
                    ?>
        <form action="ejercicio2.php">
            <label for="">Indicar dia de la semana</label>
            <input type="text" name="dia" id=""><br><br>
            <input type="submit" name="enviar" value="enviar" id="">
        </form>
        <?php
                } else {
                    $dia   = $_REQUEST["dia"];
                    $fecha = date("d-M-Y");

                    $miMenu = new Menu($dia, $fecha);
                    if(!isset($_REQUEST["agregar"])) {

                        print "<form action='ejercicio2.php'>
                    <label>Nombre del plato</label>
                    <input type='text' name='plato'> <br><br>
                    <input type='radio' name='lugar' value='primeros'>A primeros platos <br><br>
                    <input type='radio' name='lugar' value='segundos'>A segundos platos <br><br>
                    <input type='radio' name='lugar' value='postres'>A postres <br><br>
                    <input type='submit' name='agregar'>
                </form>";

                    } else {
                        $plato = $_REQUEST["plato"];
                        $lugar = $_REQUEST["lugar"];
                        if($lugar == "primeros") {
                            $miMenu->AgregarPrimer($plato);
                        } elseif($lugar == "segundos") {
                            $miMenu->AgregarSegundo($plato);
                        } else {
                            $miMenu->AgregarPostre($plato);
                        }
                        print "PLATO AGREGADO AL MENÚ <br>";
                        print " <a href='ejercicio2.php'>Agregar más platos</a>";
                        $miMenu->MostrarMenu();
                    }

                }
?>
        </main>
        <nav></nav>
    </section>
    <footer></footer>



</body>
</html>