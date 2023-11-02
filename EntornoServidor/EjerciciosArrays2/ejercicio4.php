<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estiloss.css">
</head>
<body>
    <?php
    $myarray = [];
    $myarray = range(1, 20, 1);
    $cadena = implode("-", $myarray);
    print $cadena."<br>";

    $pares =array_filter($myarray, function ($value) {

        return $value % 2 == 0;

    });

    $cadena = implode("-", $pares);
    print $cadena."<br>";



    ?>

</body>
</html>