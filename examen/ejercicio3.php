<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">

</head>
<body>
    <header><h1>EXAMEN 1ª EVALUACIOÓN</h1></header>
    <section>
        <aside></aside>
        <main>
            <div class="titulo"> <h2>Ejercicio 3</h2></div>

            <div class="contenido">
                <div class="subtitulo"><h3>Geografía española
                </h3></div>
                <div class="centrar">
                <p>Esta aplicación muestra las capitales de las Comunidades Autonomas y el número total de localidades por provincia</p>
                </div>




                <form action="ejercicio3.php">
                    <input type="submit" name="capitales" value="Capitales de Autonomías" id="">
                    <input type="submit" name="localidades" value="Localidades Provincia" id="">
                </form>

                <?php


                        if (isset($_REQUEST["capitales"])){
                        $conexion=mysqli_connect("localhost","root","","geografia");
                        $sql="SELECT comunidades.nombre, localidades.nombre from comunidades join localidades on comunidades.id_capital= localidades.id_localidad ORDER by comunidades.nombre";

                        $consulta=mysqli_query($conexion,$sql);
                        $nfilas=mysqli_num_rows($consulta);
                        print "<table border=1>";
                        print "<tr class='bd'> <th>Comunidad Autónoma</th>  <th>Capital</th> </tr>";
                        for($i=0;$i<$nfilas;$i++){
                            $resultado=mysqli_fetch_array($consulta);
                            print "<tr>";
                            print "<td>{$resultado[0]}</td><td>{$resultado[1]}</td>";
                            print"</tr>";
                        }
                        print "</table>";
                        mysqli_close($conexion);

                    }elseif(isset($_REQUEST["localidades"])){


                        $conexion=mysqli_connect("localhost","root","","geografia");
                        $sql="SELECT provincias.nombre, count(*) from provincias join localidades on provincias.n_provincia=localidades.n_provincia  GROUP by provincias.nombre";

                        $consulta=mysqli_query($conexion,$sql);
                        $nfilas=mysqli_num_rows($consulta);
                        print "<table border=1 >";
                        print "<tr  class='bd' > <th>Provincia</th>  <th>Nº localidaes</th> </tr>";
                        for($i=0;$i<$nfilas;$i++){
                            $resultado=mysqli_fetch_array($consulta);
                            print "<tr>";
                            print "<td>{$resultado[0]}</td><td>{$resultado[1]}</td>";
                            print"</tr>";
                        }
                        print "</table>";
                        mysqli_close($conexion);
                      }
                ?>





                </div>

            </div>

        </main>
        <nav></nav>
    </section>
    <footer></footer>

</body>
</html>