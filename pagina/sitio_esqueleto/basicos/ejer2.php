<!DOCTYPE html>
<html lang="en">
    <?php include "../includes/metadata2.php"; ?>
<body>
    <?php include "../includes/header2.php"; ?>
    <?php include "../includes/menu2.php"; ?>

    <section>
        <?php include "../includes/nav_BASICOS.php"; ?>

        <main>
        <div class="fijo">
			<div>
				<a class="inicio" href="index.php">Inicio ejercicios funcniones</a><h2>CONVERSOR</h2>
			</div>
		</div>
		<div class="contenido">
            <div>
        <?php
        if(!$_REQUEST) { ?>
         <form action="ejer2.php" method="post">
        <p>
          Introduce cantidad de euros a cambiar:
          <input type="number" name="cantidad" min="0" step="0.01"><br><br>
          Selecciona moneda destino:
          <select name="tipo">
            <option value="dolar">Dólar Estadounidense</option>
            <option value="libra">Libra Esterlina</option>
          </select>
        </p>
        <input type="submit" value="Enviar" name="enviar">
      </form>
            <?php

        } else {
            $cantidad = $_REQUEST['cantidad'];
            $moneda   = $_REQUEST['tipo'];
            $dolar    = 1.0563;
            $libra    = 0.8678;
            if ($moneda == 'dolar') {
                $cambio = $cantidad * $dolar;
                print "$cantidad euros equivalen a $cambio dólares estadounidenses.<br>";
                print "<br><a href='ejer2.php'>Volver a pedir nueva conversión</a>";
            } else {
                $cambio = $cantidad * $libra;
                print "$cantidad euros equivalen a $cambio libras esterlinas.<br>";
                print "<br><a href='ejer2.php'>Volver a pedir nueva conversión</a>";
            }
        }

    ?>
        </div>
		</main>
        <?php include "../includes/aside2.php"; ?>
    </section>
    <?php include "../includes/footer2.php"; ?>
</body>
</html>