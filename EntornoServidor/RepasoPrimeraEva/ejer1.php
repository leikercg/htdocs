<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
            <?php
               function letraNIF($dni)
               {
                   $letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
                   if(is_numeric($dni)) {
                       $resto = $dni % 23;
                       return $letras[$resto];
                   }else{
                    return null;
                   }
               }

            ?>
<header>
        <h1>Repaso 1ª evaluación</h1>
    </header>
    <section>
        <nav></nav>
        <div class="inicio"><a href="main.php">Inicio</a></div>
        <main>

            <h1>Ejercicio 1</h1>
            <?php
                if(!$_REQUEST) {

                    ?>
            <form action="">
                <label for="">Introduzca el número de DNI</label>
                <input type="text" name="numero" id=""><br><br>
                <label for="">Introduzca la letra del NIF correspondiente</label>
                <input type="text" name="letra" id=""><br><br>
                <input class="boton" type="reset" name="" id="">
                <input class="boton"type="submit" name="" id="">
            </form>
            <?php
                } else {
                    $numero = $_REQUEST["numero"];
                    $letra  = $_REQUEST["letra"];

                    if($letra == letraNIF($numero) || strtoupper($letra) == letraNIF($numero)) {
                        print"<h2>DNI CORRECTO:".$_REQUEST["numero"]."".$_REQUEST["letra"]."</h2>";
                    } else {
                        print"<h2>DNI INCORRECTO</h2>";
                    }
                    print "<a href='ejer1.php'>Volver al formulario</a>";
                    unset($_REQUEST);

                }
            ?>
		</main>
		<aside></aside>
	</section>
	<footer></footer>


</body>
</html>