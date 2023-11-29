<?php
function paso1($num1) {
    $divisores=[];
    if($num1 > 0 && $num1%1==0){
    for($i = 1; $i < $num1; $i++){
        if($num1%$i==0){
            array_push($divisores,$i);
        }
    }
    return Array_sum($divisores);
}
}

function paso2($num1,$num2) {
    if(paso1($num2)==$num1 && paso1($num1)==$num2){
        return true;
    }else{
        return false;
    }

}
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
    if($_REQUEST) {
       if( paso2($_REQUEST["num1"],$_REQUEST["num2"])){
        print "SON NUMEROS AMIGOS";
       }else{
        print"NO SON NUMEROS AMIGOS";
       }



    } else {
        ?>
    <form action="">
        <label for="">Numero 1:</label>
        <input type="text" name="num1" id=""><br><br>
        <label for="">Numero 2:</label>
        <input type="text" name="num2" id=""><br><br>
        <input type="submit" value="enviar" id="">
    </form>
    <?php
    }
    ?>
</body>
</html>