<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>REPASO 1ª EVALUACIÓN</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <div class="titulo"> <h2>Ejercicio 1</h2></div>
            <a href="index.php" class="inicio">Inicio</a>
            <div class="contenido">
                <?php
                    if(!$_REQUEST) {
                        ?>
                <form action="ejer1.php" method="post">
                    <label for="">Introduzca el número de DNI: </label>
                    <input type="number" name="numero" id="" required min="10000000" max="99999999" step="1"><br><br>
                    <label for="">Introduzca la letra del NIF correspondiente</label>
                    <input type="text" name="letra" id=" " maxlength="1" required><br><br>
                    <input type="submit" name="" id="" value="Enviar">
                    <input type="reset" name="" id="" value="Borrar">
                </form>
                <?php
                    }else{
                        $numero= intval($_REQUEST["numero"]);
                        $letra=$_REQUEST["letra"];
                        function dni($num) {
                            $letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];

                            $letra=$letras[$num%23];
                            return $letra;
                        }

                        if($letra==dni($numero)){
                            echo "El NIF: ".$numero."".$letra." es correcto. <br><br>";
                        }else{
                            echo "El NIF: ".$numero."".$letra." es incorrecto.<br><br>";
                        }
                        echo "<a href='ejer1.php'>Volver al formulario</a>";


                    }

                ?>
            </div>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>