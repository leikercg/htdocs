<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function aprobado($num) {
            if($num >= 5){
                print "Apobado";
            }else{
                print "Suspendido";
            }
        }
        function bidimensional(array $alumnos, array $asignaturas)
        {
            print "<table border=1>";
            print "<tr> <td>ALumnos</td>  <td>Lengua</td>  <td>Ingles</td>  <td>Mates</td>  <td>Programación</td> </tr>";
            $nuevoarrayAsig =array_flip($asignaturas);//intercambio valores por indices
            $nuevoarrayAlum=array_flip($alumnos);
            foreach ($nuevoarrayAlum as $alumno => &$miarray) {//modifico por referencia
                print "<tr> <td>$alumno</td>";
                foreach ($nuevoarrayAsig as $asignatura=> &$nota) {//este nuevo array aleatorio es el nuevo valor de $miarray, a la proxima vuekta se generará otro diferente.
                    $nota=(float)rand(0,100)/10;
                    print" <td>$nota";
                    print "<br>";
                    aprobado($nota);
                    print "</td>";
                }
                $miarray=$nuevoarrayAsig;

                print "</tr>";

            }
            print "<table>";
                return $nuevoarrayAlum;
        }

        $alumnos = ["leiker", "david", "castillo", "guzman"];
    $materias  = ["lengua", "ingles", " matematicas", "programación"];

    (bidimensional($alumnos, $materias));

    print "<table border=1>";
    print"<tr> <th>Lengua</th> <th>Ingles</th> <th>Mates</th> <th>Programación</th> </tr>";
    ?>

</body>
</html>