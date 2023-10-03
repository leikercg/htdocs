<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $n1=$_GET["numero1"];
        $n2=$_GET["numero2"];
        $n3=$_GET["numero3"];

        $lista= array($n1,$n2,$n3);

        $lista.sort();

        echo $lista;
    ?>
</body>
</html>