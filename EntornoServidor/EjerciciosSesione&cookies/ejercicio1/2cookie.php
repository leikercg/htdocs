<?php   setcookie("nombre", $_REQUEST["nombre"], time() + 3600, "/");
setcookie("color", $_REQUEST["color"], time() + 3600, "/");
//en un formulario se hace el formulario, en el segundo se declaran y en la tercera recarga se pueden usar
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=re, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:<?php print $_COOKIE['color'].";"; ?>">

   <header>
    <h1>USO DE COOKIES</h1>
   </header>
   <main>

     <?php
        if($_REQUEST) {

            print_r($_COOKIE["nombre"]);

        }
?>
     </main>

</body>
</html>