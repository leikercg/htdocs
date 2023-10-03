<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $n1= $_GET["numero"];
        if ($n1>=1&&$n1<=7) {

            if ($n1==1) {
                echo "es el lunes";
            } elseif($n1==2) {
                echo "es el martes";
            }
            elseif($n1==3) {
                echo "es el miercoles";
            }
            elseif($n1==4) {
                echo "es el jueves";
            }
            elseif($n1==5) {
                echo "es el viernes";
            }
            elseif($n1==6) {
                echo "es el sabado";
            }
            else{
                echo "es el domingo";
            }
        }else{
            echo '<a href="ejercicio3.html"> volver </a>';
        }


    ?>

</body>
</html>