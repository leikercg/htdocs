<?php
include "Persona.php";
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
    $miPersona=new Empleada("Leiker","Castillo",26,"Programador",12899);
    $miPersona->presentar();
    ?>


</body>
</html>