<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">


    <?php
    $comunidades = ["Andalucía", "Aragón", "Principado de Asturias", "Islas Baleares", "Canarias", "Cantabria", "Castilla y León", "Castilla La Mancha", "Cataluña", "Comunidad Valenciana", "Extremadura", "Galicia", "Comunidad de Madrid", "Región de Murcia", "Comunidad Foral de Navarra", "País Vasco", "La Rioja", "Ceuta", "Melilla"];

    $capitales = ["Sevilla", "Zaragoza", "Oviedo", "Palma de Mallorca", "Santa Cruz de Tenerife y Las Palmas de Gran Canaria", "Santander", "Valladolid", "Toledo", "Barcelona", "Valencia", "Mérida", "Santiago de Compostela", "Madrid", "Murcia", "Pamplona", "Vitoria-Gasteiz", "Logroño", "Ceuta", "Melilla"];

    //creamos array asociativo
    $arryAsocc = [];
    $contador  = 0;

    $auxComunidadesYcapitales = array_flip($comunidades);

    foreach ($auxComunidadesYcapitales as $key => &$value) {
        $value = $capitales[$contador];
        $contador++;
    }
    $comunidadesYcapitales=$auxComunidadesYcapitales;
    print_r($comunidadesYcapitales);
    //////////////////////

    ?>
</head>
<body>
    <header><h1>EXAMEN 1ª EVALUACIOÓN</h1></header>
    <section>
        <aside></aside>
        <main>
            <div class="titulo"> <h2>Ejercicio 2</h2></div>

            <div class="contenido">
                <div class="subtitulo"><h3>Autonomías y capitales
                </h3></div>
                <div class="centrar">
                <p>Esta aplicación es un juego sobre comonocimientos de geografía española</p>
                </div>

                <h3>Enlaza la ciudad con la región a la que pertenece</h3>
                <form action="ejercicio2.php">
                    <label for="">Elige la comunidad autónoma</label>
                    <select name="comunidad" id="">
                        <?php
                        $auxComunidades=$comunidades;
                        asort($auxComunidades);
                        foreach ($auxComunidades as $key => $value) {
                            print "<option value='$value'>$value</option>";
                        }
                        ?>
                    </select>
                    <br><br>
                    <?php
                print_r($comunidadesYcapitales);?>

                    <label for="">Elige su capital</label>
                    <select name="capital" id="">
                        <?php
                        $auxCapitales=$capitales;
                        asort($auxCapitales);
                        foreach ($auxCapitales as $key => $value) {
                            print "<option value='$value'>$value</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Comprobar" name="" id="">
                </form>

                <?php
                  if($_REQUEST) {
                    $capital=$_REQUEST["capital"];
                    $comunidad=$_REQUEST["comunidad"];




                    $validar=array_search($capital,$comunidadesYcapitales);
                    print($capital);
                    print($comunidad);
                    print($validar);


                   if($comunidad=$validar){
                    print "<h3>El resultado de la consulta: Acierto";
                    print "<p>$capital SI es la capital de $comunidad</p>";
                   }else{
                    print "<h3>El resultado de la consulta: Fallo";
                    print "<p>$capital NO es la capital de $comunidad</p>";
                   }


                  }
                ?>
                </div>

            </div>

        </main>
        <nav></nav>
    </section>
    <footer></footer>

</body>
</html>