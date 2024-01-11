<?php
include "Menu.php";
session_start();
if(!isset($_SESSION["serializado"]) && isset($_REQUEST["dia"])){//SI NO ESTÁ CREADA LA VARIABLE DE SESIÓN Y SI ESTA ESTABLECIDO EL DIA SE CREA EL OBEJOTO $miMenu.
    $miMenu=new Menu($_REQUEST["dia"],$_REQUEST["fecha"]);
                        $_SESSION["serializado"]=serialize($miMenu);
}
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
                    if(!$_REQUEST){//se muesta esto si no está establecido el array Request[]
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
                }else{//si no esta establecido se muestra esto:
                    if((isset($_REQUEST["crear"]) && isset($_REQUEST["add1"])) || (isset($_REQUEST["crear"]) && isset($_REQUEST["add2"])) || (isset($_REQUEST["crear"]) && isset($_REQUEST["add3"])) || isset($_REQUEST["crear"])){//todas estas combinaciones son para excluir al formulario de confeccionar carta.
                        if(isset($_REQUEST["primero"])){//esto significa que ha sido enviado el primer formulario, usamos sus los datos para agregar el plato al menu.
                            $primero=$_REQUEST["primero"];
                            $miMenu=unserialize($_SESSION["serializado"]);
                            $miMenu->AgregarPrimer($primero);
                            $_SESSION["serializado"]=serialize($miMenu);
                        }
                        if(isset($_REQUEST["segundo"])){
                            $segundo=$_REQUEST["segundo"];
                            $miMenu=unserialize($_SESSION["serializado"]);
                            $miMenu->AgregarSegundo($segundo);
                            $_SESSION["serializado"]=serialize($miMenu);
                        }


                        if(isset($_REQUEST["postre"])){
                            $postre=$_REQUEST["postre"];
                            $miMenu=unserialize($_SESSION["serializado"]);
                            $miMenu->AgregarPostre($postre);
                            $_SESSION["serializado"]=serialize($miMenu);
                        }


                        $miMenu=unserialize($_SESSION["serializado"]);
                        $miMenu->mostrarFecha();//esto es usado para mostrar simplemente el titulo de la segunda página
                        $_SESSION["serializado"]=serialize($miMenu);

                ?>

                    <form action="ejercicio2.php">
                        <input type="text" hidden name="crear">
                        <div class="divAdd">
                            <label><b>Primeros platos</b></label><br>
                            <?php
                                $miMenu=unserialize($_SESSION["serializado"]);
                                $miMenu->MostrarPrimeros();//esta funcion imprime los platos existentes en el menú.
                                $_SESSION["serializado"]=serialize($miMenu);

                            ?>
                            <input class="campo" type="text" name="primero">
                            <input type="submit" name="add1" value="añadir">
                        </div>
                    </form>
                    <form action="ejercicio2.php">
                    <input type="text" hidden name="crear">
                        <div class="divAdd">
                            <label><b>Segundos platos</b></label><br>
                            <?php
                                $miMenu=unserialize($_SESSION["serializado"]);
                                $miMenu->MostrarSegundos();//esta funcion imprime los platos existentes en el menú.
                                $_SESSION["serializado"]=serialize($miMenu);

                            ?>
                            <input class="campo" type="text" name="segundo">
                            <input type="submit" name="add2" value="añadir">
                        </div>
                    </form>
                    <form action="ejercicio2.php">
                    <input type="text" hidden name="crear">
                        <div class="divAdd">
                            <label><b>Postres platos</b></label><br>
                            <?php
                                $miMenu=unserialize($_SESSION["serializado"]);
                                $miMenu->MostrarPostres();//esta funcion imprime los platos existentes en el menú.
                                $_SESSION["serializado"]=serialize($miMenu);
                            ?>
                            <input class="campo" type="text" name="postre">
                            <input type="submit" name="addp" value="añadir">
                        </div>
                    </form>
                    <form action="ejercicio2.php">
                        <div class="divAdd">
                        <br>
                        <input type="submit" name="confeccionar" value="Confeccionar Carta">
                        </div>
                    </form>



                    </form>

                <?php
                    }else if(isset($_REQUEST["confeccionar"])){//si es establecido confeccionar mostrar esto:
                        $miMenu=unserialize($_SESSION["serializado"]);
                        $miMenu->presentacion();//función que hace la representación final del menú.
                        $_SESSION["serializado"]=serialize($miMenu);


                        //header("Location:ejercicio2.php");
                        //exit; // Asegúrate de usar exit después de la redirección para detener la ejecución del script
                        //recargar es diferente, reenvia la solicitud actual, es decir vuelve a enviar los mismos datos del formulario.
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