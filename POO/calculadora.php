<?php
 include "Racional.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $miRacional= new Racional("8/4");
    print $miRacional->__toString();
    print "<br>";

    $tuRacional= new Racional("10/4");
    print $tuRacional->__toString();
    print "<br>";
    $miRacional->restar($tuRacional);
    print $miRacional->__toString();
    print "<br>";







    ?>

</body>
</html>