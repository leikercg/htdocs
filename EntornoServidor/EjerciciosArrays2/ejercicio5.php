<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    function masLarga(array $miArray) {

        $palabra="";
        $tamanio=0;
        foreach ($miArray as $key => $value) {
           if(strlen($value)>=$tamanio){
            $tamanio=strlen($value);
            $palabra=$value;
           }
        }
        return $palabra;

    }

    function masCorta(array $miArray) {

        $palabra="";
        $tamanio=10000000000000000;
        foreach ($miArray as $key => $value) {
           if(strlen($value)<=$tamanio){
            $tamanio=strlen($value);
            $palabra=$value;
           }
        }
        return $palabra;

    }

    function masde5(array $miArray) {

        $lista=[];
        $tamanio=5;
        foreach ($miArray as $key => $value) {
           if(strlen($value)>$tamanio){
            array_push($lista,$value);
           }
        }
        return $lista;

    }

    function inviertePalabras(array $miArray){
        $nuevoArray=[];

        foreach ($miArray as $key => $value) {
            $invertida="";
            for($i = strlen($value)-1; $i>=0; $i-- ){
                $invertida.=$value[$i];
            }
            array_push($nuevoArray,$invertida);
        }
        return $nuevoArray;
    }

    ?>
</head>
<body>
    <?php
        $lista=array("leon","perro","gato","tigre","mariposa", "elefante","zorro","ave");

        $palabra=masLarga($lista);
        print $palabra."<br>    ";

        $palabra=masCorta($lista);
        print $palabra."<br>    ";

        print implode("-",masde5($lista));

        $listaordenada=$lista;
        asort($listaordenada);

        print"<br>";

        print_r($listaordenada);
 print"<br>";
        print_r($lista);


        $listainversa= inviertePalabras($lista);
        print"<br>";

        print_r($listainversa);


    ?>


</body>
</html>