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
    <br><br>

    <form action="ejercicio4.php">
        <label for="">ver estadisticas</label>
        <input type="submit" name="VerEstadisticas" id="">
    </form>

    <br><br>
    <form action="ejercicio4.php">
        <label for="">modificar libro</label>
        <select name="libro" id="">
            <?php
                $conexion = mysqli_connect("localhost", "root", "", "bdlibros");
        $sql      = "SELECT libros.titulo FROM libros";
        $consulta = mysqli_query($conexion, $sql);
        $nfilas   = mysqli_num_rows($consulta);
        for($i =0;$i<$nfilas;$i++){
            $resultado=mysqli_fetch_array($consulta);
            print "<option value='$resultado[0]'>$resultado[0]</option>";
        }
            ?>
        </select>
        <input type="submit" name="ModificarLibro" id="">
    </form>

    <br><br>





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

    } elseif(isset($_REQUEST["VerGenero"])) {/////ver genero
        $genero = $_REQUEST["genero"];
        print_r($_REQUEST);
        $conexion = mysqli_connect("localhost", "root", "", "bdlibros");
        $sql      = "SELECT libros.titulo from libros join genero on (libros.idgenero=genero.id) where genero.nombre='{$_REQUEST["genero"]}'"; ///////PONER COMILLAAAAAS!!!
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

    } elseif(isset($_REQUEST["VerEstadisticas"])) {
        $conexion = mysqli_connect("localhost", "root", "", "bdlibros");
        $sql      = "SELECT genero.Nombre , count(*) as 'numero de libros' FROM libros JOIN genero ON libros.IdGenero=genero.Id GROUP BY genero.Nombre";//ojo a las comillas
        $consulta = mysqli_query($conexion, $sql);
        $nfilas   = mysqli_num_rows($consulta);
        print "estos son las categorias y numero de libros ";
        print "<table border =1>";
        print "<tr> <th>GENERO</th><th>NUMERO DE LIBROS </th> </tr>";
        $maxLibros=0;
        for($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_array($consulta);
            print"<tr> <td>$resultado[0]</td> <td>$resultado[1]</td> </tr> ";
            if($resultado[1]>=$maxLibros){
                $maxLibros=$resultado[1];
            }
        }
        print "</table>";

        $sql="SELECT genero.Nombre  FROM libros JOIN genero ON libros.IdGenero=genero.Id  GROUP BY genero.Nombre having count(*)='$maxLibros'";
        $consulta = mysqli_query($conexion, $sql);
        $nfilas   = mysqli_num_rows($consulta);
        for($i = 0; $i < $nfilas; $i++){
            print "genero de: $resultado[0] <br><br>";
        }

        mysqli_close($conexion);
    }elseif(isset($_REQUEST["ModificarLibro"])){
        $libro=$_REQUEST["libro"];
        $conexion = mysqli_connect("localhost", "root", "", "bdlibros");
        $sql      = "SELECT * FROM libros where titulo='{$_REQUEST["libro"]}'";
        $consulta = mysqli_query($conexion, $sql);
        $nfilas   = mysqli_num_rows($consulta);
        print "Datos del libro {$_REQUEST["libro"]} <br>";
        print "<form action='ejercicio4.php'>";
        for($i =0;$i<$nfilas;$i++){
            $resultado=mysqli_fetch_array($consulta);
           print" <label>ID</label>";
            print "<input required readonly name='id' value='$resultado[0]'>";
            print "<br><br>";
            print" <label>Titulo</label>";
            print "<input required  type='text' name='titulo' value='$resultado[1]'>";
            print "<br><br>";
            print" <label>Autor</label>";
            print "<input required  type='text' name='autor' value='$resultado[2]'>";
            print "<br><br>";
            print" <label>Id genero</label>";
            print "<input required  type='number' step='1' name='genero' value='$resultado[3]'>";
            print "<br><br>";
            print" <label>Precio</label>";
            print "<input required  type='number' step='0.01' name='precio' value='$resultado[4]'>";
            print "<br><br>";
        }
        print "<input type='submit' name='modificar'><br><br>";
        print "</form>";

        mysqli_close($conexion);
    }elseif(isset($_REQUEST["modificar"])){
        $titulo=$_REQUEST["titulo"];
        $id=$_REQUEST["id"];
        $autor=$_REQUEST["autor"];
        $genero=$_REQUEST["genero"];
        $precio=$_REQUEST["precio"];

        $conexion = mysqli_connect("localhost", "root", "", "bdlibros");
        $sql      = "UPDATE libros set titulo='$titulo', autor='$autor', idgenero=$genero, precio=$precio where id=$id";
        $consulta = mysqli_query($conexion, $sql);





    }


    print "<a href='ejercicio4.php'>Volver al formulario</a>";

    ?>



</body>
</html>