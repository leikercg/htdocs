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
        if ($n1%2==0) {
            echo "$n1 es par";
        }else{
            echo "$n1 es iiiimmmpar";
        }
    ?>

</body>
</html>