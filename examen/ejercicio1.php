<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">

    <?php
    function crearArrayBi(int $dimension) //crear array
    {
        $miArray = [];
        for($i = 0; $i < $dimension; $i++) {
            for($j = 0; $j < $dimension; $j++) {
                $miArray[$i][$j]=rand(-20,20);
            }
        }
        return $miArray;

    }

    function sunmaMatricesN(array $array1, array $array2){
        $dimension= count($array1);//para saber el tamaño de N
        $arraySuma=[];
        for($i = 0; $i < $dimension; $i++) {
            for($j = 0; $j < $dimension; $j++) {
                $arraySuma[$i][$j]=$array1[$i][$j]+$array2[$i][$j];
            }
        }
        return $arraySuma;
    }

    function imprimirArray(array $miArray) {
        $dimension= count($miArray);//para saber el tamaño de N
        $arraySuma=[];
        print "<table class='matriz'";
        for($i = 0; $i < $dimension; $i++) {
            print "<tr>";
            for($j = 0; $j < $dimension; $j++) {
                $miArray[$i];
                print  "<td>".$miArray[$i][$j]."</td>";

            }
            print "</tr>";
        }
        print  "</table>";
    }
    ?>
</head>
<body>
    <header><h1>EXAMEN 1ª EVALUACIOÓN</h1></header>
    <section>
        <aside></aside>
        <main>
            <div class="titulo"> <h2>Ejercicio 1</h2></div>

            <div class="contenido">
                <div class="subtitulo"><h3>Suma de matrices</h3></div>
                <div class="centrar">
                    <p>Esta aplicación resuelve la suma de dos matrices cuadradas de dinemsión NxM cutos elementos son números alaetorios entre -20 y 20. La dimension N no puede ser mayor que 5</p>
                    <?php
                    if($_REQUEST) {
                        $dimension = $_REQUEST["dimension"];
                        $array1=crearArrayBi($dimension);
                        $array2=crearArrayBi($dimension);

                        $arraySuma=sunmaMatricesN($array1,$array2);
                        print "<div class='suma'>";
                        imprimirArray($array1);
                        print "<p>+</p>";
                        imprimirArray($array2);
                        print "<p>=</p>";
                        imprimirArray($arraySuma);

                        print "</div>";








                    }
                        ?>

                </div>
                <form action="ejercicio1.php" class="formulario">
                    <label for="">Introduzca la dimensión de las matrices</label><br><br>
                    <input type="number" min="1" max="5" step="1" name="dimension" id="" min="1" required
                    >
                    <input type="submit" value="Enviar" name="" id="">

                </form>

            </div>
        </main>
        <nav></nav>
    </section>
    <footer></footer>

</body>
</html>