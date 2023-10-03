<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $n1=$_GET["numero"];
        $radio=$n1*PI();
        $area=$n1*PI()*PI();
       echo "El radio es $radio";
       echo "<br>";
       echo "El area es $area";
    ?>

</body>
</html>