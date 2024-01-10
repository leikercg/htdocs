<?php
include "Persona.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>CLASE EMPLEADO</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <div id="contenido">
            <?php
                $miPersona = new Empleado("Leiker", "Castillo", 26, "programador", 1500);
                $miPersona2    = new Empleado("David", "Guzmán", 26, "gerente", 2010);
                $miPersona3    = new Empleado("Pedro", "Costa", 26, "comercial", 2000);
                $miPersona->presentar();
                $miPersona2->presentar();
                $miPersona3->presentar();
            ?>
            </div>
        </main>
        <aside></aside>
    </section>

    <footer>
    </footer>

</body>
</html>