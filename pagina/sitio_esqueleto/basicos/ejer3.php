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
         <form action="ejer3.php" method="GET">
				<p>Cambio de 1 euro a dólares estadounidenses: <input type="number" name="cambioDolar" step="0.0001" min="0" required></p>
				<p>Cambio de 1 euro a libras esterlinas: <input type="number" name="cambioLibra" step="0.0001" min="0" required></p>
				<input type="submit" value="Enviar">
			</form>
            <?php

        } else {
            $cambioDolar = $_GET['cambioDolar'];
            $cambioLibra = $_GET['cambioLibra'];
            $fecha       = date("d-m-y");
            print "<h1 id='centrado'>CAMBIO DE DIVISAS A FECHA $fecha</h1>";
            print "<table>";
            print "<tr>
                    <th>Euros</th>
                    <th>Dolares</th>
                    <th>Libras</th>
                </tr>";
            for ($euro = 1; $euro <= 10; $euro++) {
                if ($euro % 2 == 0) {
                    print "<tr class='par'>";
                } else {
                    print "<tr class='impar'>";
                }
                print "<td>$euro</td>";
                echo "<td>", $euro * $cambioDolar,"</td>";
                echo "<td>", $euro * $cambioLibra,"</td>";
                print "</tr>";
            }
            print "</table>";
        }

    ?>
        </div>
		</main>
        <?php include "../includes/aside2.php"; ?>
    </section>
    <?php include "../includes/footer2.php"; ?>
</body>
</html>