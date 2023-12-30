<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html,body{
            margin: 0px;
            padding: 0px;
            font-family: Arial, Helvetica, sans-serif;
        }

        header{
            height: 20vh;
            width: 100%;
            background-color: cadetblue;
        }
        section{
            width: 100%;
            height: 60vh;
            background-color: bisque;
            display: flex;
        }
        nav{
            height: 100%;
            width: 33.333%;
        }
        aside{
            height: 100%;
            width: 33.333%;
        }
        footer{
            height: 20vh;
            width: 100%;
            background-color: cadetblue;
        }
        h2{
            border: 3px solid black;
            text-align: center;
        }
        .error{
            color:red;
        }
        .bien{
            color: green;
        }
        table{
            border-collapse: collapse;
            text-align: center;
            border: 2px solid grey;
        }
        th,td{
            width: 200px;
            height: 50px;
            background-color: pink;
        }
    </style>
</head>
<body>
    <header></header>
    <section>
        <aside></aside>
        <main>
            <h2>Introduce la casilla que falta Tania Ferrufino</h2>
            <?php
            /*usamos un input escondido para enviar la solucion de la base de datos junto con el input de introducido por el usuario para ser validada en la siguiente carga de la página.
            para verificar que el contador de aciertos y fallos enviamo almacenamos la solución de la base de datos en una variable de session, si en la siguiente carga el valor de la solucion de array request y del array session no es el mismo, es por que se está recargando la pagina con f5*/
                if(isset($_REQUEST["empezar"])||isset($_REQUEST["solucion"])) {
                    $conexion = mysqli_connect("localhost", "root", "", "verbosirregulares"); // conectamos a la base de datos
                    $id       = rand(1, 154); // id del verbo a examinar

                    $sql = "SELECT infinitivo, pasado_simple, participio_pasado, traduccion from verbos_irregulares where id='$id'";

                    $casilla = rand(0, 3); // columna a examinar de las 4 posibles

                    $consulta = mysqli_query($conexion, $sql);
                    $nfilas   = mysqli_num_rows($consulta);
                    print "<form action='irregulares.php'>";
                    print "<table border=1>";
                    print "<tr><th>INFINITIVO</th><th>PASADO SIMPLE</th><th>PASADO PARTICIPIO</th><th>TRADUCCION</th></tr>";


                    if(isset($_REQUEST["solucion"])){
                        $solucion=$_REQUEST["solucion"];
                        $respuesta=$_REQUEST["respuesta"];
                        if(strtolower($respuesta)==strtolower($solucion) && $_SESSION["recarga"]==$solucion){
                            print "<h3 class='bien' >Respuesta correcta GUUUUUUUUORDA</h3>";
                            $_SESSION["aciertos"]++;
                        }elseif(strtolower($respuesta)!=strtolower($solucion) && $_SESSION["recarga"]==$solucion){
                            print "<h3 class='error' >Respuesta erronea, la solución es $solucion</h3>";
                            $_SESSION["fallos"]++;
                        }


                    }

                    print"<h4 class='bien'>Numero de aciertos: {$_SESSION["aciertos"]}</h4>";
                    print"<h4 class='error'>Numero de fallos: {$_SESSION["fallos"]}</h4>";
                    for($i = 0; $i < $nfilas; $i++) {


                        $resultado = mysqli_fetch_array($consulta);
                        if($casilla == 0) {
                            print "<tr><td><input type='text' autofocus required name='respuesta'></td><td>$resultado[1]</td><td>$resultado[2]</td><td>$resultado[3]</td></tr>";
                        } elseif($casilla == 1) {
                            print "<tr><td>$resultado[0]</td><td><input type='text' autofocus required name='respuesta'></td><td>$resultado[2]</td><td>$resultado[3]</td></tr>";
                        } elseif($casilla == 2) {
                            print "<tr><td>$resultado[0]</td><td>$resultado[1]</td><td><input type='text' autofocus required name='respuesta'></td><td>$resultado[3]</td></tr>";
                        } else {
                            $sql_1="SELECT traduccion from verbos_irregulares order by traduccion";
                            $consulta_1=mysqli_query($conexion,$sql_1);
                            $nfilas_1=mysqli_num_rows($consulta_1);
                            print "<tr><td>$resultado[0]</td><td>$resultado[1]</td><td>$resultado[2]</td><td> <select name='respuesta'>";
                            for($j=0; $j<$nfilas_1;$j++){
                                $resultado_1=mysqli_fetch_array($consulta_1);
                               print" <option value='$resultado_1[0]'>$resultado_1[0]</option>";

                            }
                            print " </select></td></tr>";
                        }

                        print "<input type='text' name='solucion' value='$resultado[$casilla]' hidden>";/*coger la solucion para verificar en la sigueinte carga la solucion de la recgar debe ser igual a la solución, si no es que se esta reenviando el mismo formulario, es decir pulsando f5*/
                        $_SESSION["recarga"]=$resultado[$casilla];
                    }
                    print "</table><br>";
                    print "<input type='submit' value='Comprobar'>";
                    print "</form>";
                    mysqli_close($conexion);
                }else{
                    print"<form action='irregulares.php'>
                    <input type='submit'value='Empezar' name='empezar'>
                </form>";
                $_SESSION["aciertos"]=0;
                $_SESSION["fallos"]=0;

                }
            ?>
        </main>
        <nav></nav>
    </section>
    <footer></footer>
</body>
</html>