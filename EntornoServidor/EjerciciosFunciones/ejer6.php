<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    function inviertePalabras(String $miString){
        $invertida="";

            for($i = strlen($miString)-1; $i>=0; $i-- ){
                $invertida.=$miString[$i];
            }
                   return $invertida;

        }

    ?>
</head>
<body>
    <?php
        if($_REQUEST){
            $frase=$_REQUEST["frase"];
            $fraseMayus=strtoupper($frase);
            print "La frase enviada en mayúsculas es: <br>$fraseMayus";

            $fraseInvertida = inviertePalabras($frase);

            $fraseInvertida=str_replace(" ","",strtoupper($fraseInvertida));//quitamos espacios y ponemos en mayus
            print"<br> $fraseInvertida <br>";

            if($fraseInvertida==str_replace(" ","",$fraseMayus)){
                print "Son palindromos";
            }else{
                print "No son palindromos";
            }

            $lista=array("hola","hola","adios","hola","que");
           // $listaunica= array_values(array_unique($lista));
           $listaContada=array_count_values($lista);
            print_r($listaContada);



        }else{
    ?>
    <form action="ejer6.php">
        <fieldset>
            <legend>Formulario</legend>
            <label for="frase">Introduce una frase</label>
            <br>
            <input type="text" name="frase" id="frase"  value="Escribe aqui tu frase">
            <br><br>
            <input type="submit" name="" id="">
        </fieldset>
    </form>
     <?php
}
    ?>

</body>
</html>