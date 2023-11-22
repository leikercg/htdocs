<!DOCTYPE html>
<html lang="en">
    <?php include("../includes/metadata2.php") ?>
<body>
    <?php include("../includes/header2.php") ?>
    <?php include("../includes/menu2.php") ?>

    <section>
        <?php include("../includes/nav_funciones.php") ?>

        <main>
        <div class="fijo">
			<div>
				<a class="inicio" href="index.php">Inicio ejercicios funciones</a><h2>PERFECTOS</h2>
			</div>
		</div>
        <div class="contenido">
        <?php
                    define("PI", 3.141592);       //También se puede definir una variable constante (const PI=3.141592) o simplemente usar pi() o M_PI, ya definidas en PHP
                function circulo($r, &$l, &$a)  //Paso por referencia de los parámetros $l y $a, referentes a la longitud y al área
                {
                    $l = 2  * PI * $r;
                    $a = PI * pow($r, 2);
                }

                print "<h1>Pruebas de función círculo</h1>";

                $radio = 3;
                circulo($radio, $longitud, $area);
                print "El círculo de radio $radio tiene longitd $longitud y área $area<br/>";

                circulo(4.5, $longitud, $area);
                print "El círculo de radio 4.5 tiene longitd $longitud y área $area<br/>";
                ?>
        </div>
		</main>
        <?php include("../includes/aside2.php") ?>
    </section>
    <?php include("../includes/footer2.php") ?>
</body>
</html>