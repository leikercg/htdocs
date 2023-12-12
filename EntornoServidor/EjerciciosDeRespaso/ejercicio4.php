<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    function lista()
    {

        $conexion = mysqli_connect("localhost", "root", "", "bdlibros");
        $sql      = "SELECT id, titulo, autor, precio from libros";
        $consulta = mysqli_query($conexion, $sql);
        $nfilas   = mysqli_num_rows($consulta);
        print "<table border = 1>";
        print "<tr> <th>ID</th>  <th>Titulo</th>  <th>Autor</th>  <th>Precio</th> </tr>";
        for($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_array($consulta);
            print"<tr> <th>{$resultado[0]}</th>  <th>{$resultado[1]}</th>  <th>{$resultado[2]}</th>  <th>{$resultado[3]}</th> </tr>";
        }
        print "<table>";
        mysqli_close($conexion);
    }

    ?>
</head>
<body>
    <?php
        lista();

    print "<br>";






    if (!$_REQUEST) {
        ?>
    <form action="ejercicio4.php">
        <label for="">Selecciona un nombre de autor</label>
        <select name="autor" id="">
        <?php
                 $conexion = mysqli_connect("localhost", "root", "", "bdlibros");
        $sql               = "SELECT distinct autor from libros";
        $consulta          = mysqli_query($conexion, $sql);
        $nfilas            = mysqli_num_rows($consulta);

        for($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_array($consulta);
            print "<option value='$resultado[0]'>$resultado[0]</option>";
        }
        mysqli_close($conexion);
        ?>
        </select>
        <input type="submit" name="VerAutor" id="">
    </form>

    <br><br>

    <form action="ejercicio4.php">
        <label for="">Selecciona un nombre de genero</label>
        <select name="genero" id="">
        <?php
                 $conexion = mysqli_connect("localhost", "root", "", "bdlibros");
        $sql               = "SELECT nombre from genero ";
        $consulta          = mysqli_query($conexion, $sql);
        $nfilas            = mysqli_num_rows($consulta);

        for($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_array($consulta);
            print "<option value='$resultado[0]'>$resultado[0]</option>";
        }
        mysqli_close($conexion);
        ?>
        </select>
        <input type="submit" name="VerGenero" id="">
    </form>





    <?php
    } elseif(isset($_REQUEST["VerAutor"])) {

        $autor    = $_REQUEST["autor"];
        $conexion = mysqli_connect("localhost", "root", "", "bdlibros");
        $sql      = "SELECT distinct titulo from libros where autor='{$_REQUEST["autor"]}'";
        $consulta = mysqli_query($conexion, $sql);
        $nfilas   = mysqli_num_rows($consulta);

        print "estos son los libros de {$_REQUEST["autor"]}: ";
        print "<ol>";
        for($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_array($consulta);
            print"<li>$resultado[0]</li> ";
        }
        print "</ol>";
        mysqli_close($conexion);




    }elseif(isset($_REQUEST["VerGenero"])){/////ver genero
        $genero    = $_REQUEST["genero"];
        print_r($_REQUEST);
        $conexion = mysqli_connect("localhost", "root", "", "bdlibros");
        $sql ="SELECT libros.titulo from libros join genero on (libros.idgenero=genero.id) where genero.nombre='{$_REQUEST["genero"]}'";///////PONER COMILLAAAAAS!!!
        $consulta = mysqli_query($conexion, $sql);
        $nfilas   = mysqli_num_rows($consulta);

        print "estos son los libros de {$_REQUEST["genero"]}: ";
        print "<ol>";
        for($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_array($consulta);
            print"<li>$resultado[0]</li> ";
        }
        print "</ol>";
        mysqli_close($conexion);
    }
    print "<a href='ejercicio4.php'>Volver al formulario</a>";
    ?>



</body>
</html>