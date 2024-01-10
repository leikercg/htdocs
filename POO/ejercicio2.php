<?php
include "Menu.php";
session_start();
$_SESSION["miMenu"]=2;
print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header><h1>RESTAURANTE</h1></header>
    <section>
        <nav></nav>
        <main>
            <div id="contenido">
                <?php
                    if(!$_REQUEST || isset($_REQUEST["otroMenu"])){
                ?>
                    <div id="subtitulo">Configuración del menú del día</div>
                    <form action="ejercicio2.php" id="formInicio">
                        <div class="divForm">
                            <label>Día de la semana:</label>
                            <input type="text" name="dia">
                        </div>
                        <div class="divForm">
                            <label>Fecha:</label>
                            <input type="text" name="fecha" placeholder="01/01/2000" >
                        </div>
                        <div class="divForm">
                            <input type="submit" name="crear" value="Diseñar menú">
                        </div>
                    </form>
                <?php
                }else{
                    if((isset($_REQUEST["crear"]) && isset($_REQUEST["add1"])) || (isset($_REQUEST["crear"]) && isset($_REQUEST["add2"])) || (isset($_REQUEST["crear"]) && isset($_REQUEST["add3"])) || isset($_REQUEST["crear"])){
                        $miMenu=new Menu($_REQUEST["dia"],$_REQUEST["fecha"]);
                ?>
                    <div id="subtitulo">Configuración del menú del día</div>
                    <form action="ejercicio2.php">
                        <input type="text" hidden name="crear" id="">
                        <div class="divAdd">
                            <label><b>Primeros platos</b></label><br>
                            <?php

                            ?>
                            <input type="text" name="primero">
                            <input type="submit" name="add1" value="añadir">
                        </div>
                    </form>
                    <form action="ejercicio2.php">
                        <div class="divAdd">
                            <label><b>Segundos platos</b></label><br>
                            <input type="text" name="primero">
                            <input type="submit" name="add2" value="añadir">
                        </div>
                    </form>
                    <form action="ejercicio2.php">
                        <div class="divAdd">
                            <label><b>Postres platos</b></label><br>
                            <input type="text" name="primero">
                            <input type="submit" name="addp" value="añadir">
                        </div>
                    </form>
                    <form action="ejercicio2.php">
                        <div class="divAdd">
                        <br>
                        <input type="submit" name="confeccionar" value="Confeccionar carta">
                        </div>
                    </form>




                    </form>

                <?php
                    }

                }
                ?>

            </div>
        </main>
        <aside></aside>
    </section>
    <footer></footer>

</body>
</html>