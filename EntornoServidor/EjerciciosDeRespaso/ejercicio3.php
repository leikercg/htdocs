<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function bidimensional($alumnos, $asignaturas)
        {
            $arrayMulti = [];
            $arrayNotas = [];

            foreach ($alumnos as $indice => $nombre) {
                foreach ($asignaturas as $indicenotas => $clase) {
                    $nota        = rand(0, 1000)/100;
                    $indicenotas = $clase;
                    $arrayNotas[$clase] = $nota;
                }
                $boletin             = $arrayNotas;
                $arrayNotas          = [];
                $arrayMulti[$nombre] = $boletin;
            }
            return $arrayMulti;

        }

        $lista = ["leiker", "david", "castillo", "guzman"];
    $materias  = ["lengua", "ingles", " matematicas", "programación"];

    print_r(bidimensional($lista, $materias));

    print "<table border=1>";
    print"<tr> <th>Lengua</th> <th>Ingles</th> <th>Mates</th> <th>Programación</th> </tr>";
    ?>

</body>
</html>