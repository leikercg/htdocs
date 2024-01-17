<?php
 include "Racional.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilosCalculadora.css">
</head>
<body>
    <header><h1>CALCULADORA RACIONALES</h1></header>
    <section>
        <aside></aside>
        <main>
            <?php
                if(!$_REQUEST){//si no esta establecido el array request*/
            ?>
            <div id="contenido">
                <form id="formulario" action="calculadora.php">
                    <fieldset id="reglas">
                        <legend>Reglas de uso de la calculadora</legend>
                        <ul>
                            <li>La calculadora se usa escribiendo la operación completa.</li>
                            <li>La operación será <strong>Operando_1 operación Operando_2.</strong></li>
                            <li>Cada operando puede ser un número <em>positivo</em> entero o racional.</li>
                            <li>Los operadores racionales permitidos son <span style="color: blue;">+ - * :</span> </li>
                            <li>No se deben dejar espacios en blanco entre operandos y operación.</li>
                            <li>Ejemplos:
                                <ul><li>5+4</li><li>5/2:2</li><li>1/4*2/3</li><li>2/7:1/3</li></ul>
                            </li>
                        </ul>
                    </fieldset>

                    <div id="derecha">
                        <fieldset id="operacion">
                            <legend>Establece la operación</legend>
                            <label>Operación:</label>
                            <input type="text" name="operacion" required>
                            <input type="submit" name="" value="Calcular">
                        </fieldset>

                        <fieldset id="resultado">
                            <legend>Resultado</legend>
                        </fieldset>
                     </div>
                </form>
            </div>
            <?php
                }else{
                    $operacion=$_REQUEST["operacion"];
                    $operando1;
                    $operando2;
                    $accion;
                    if(strpos($operacion,":")){
                        $operacionEnPartes=explode(":",$operacion);
                        $operando1=$operacionEnPartes[0];
                        $operando2=$operacionEnPartes[1];
                        $accion=":";
                    }elseif(strpos($operacion,"*")){
                        $operacionEnPartes=explode("*",$operacion);
                        $operando1=$operacionEnPartes[0];
                        $operando2=$operacionEnPartes[1];
                        $accion="*";
                    }elseif(strpos($operacion,"+")){
                        $operacionEnPartes=explode("+",$operacion);
                        $operando1=$operacionEnPartes[0];
                        $operando2=$operacionEnPartes[1];
                        $accion="+";
                    }elseif(strpos($operacion,"-")){
                        $operacionEnPartes=explode("-",$operacion);
                        $operando1=$operacionEnPartes[0];
                        $operando2=$operacionEnPartes[1];
                        $accion="-";
                    }

                    $racionalPrimero=new Racional($operando1);
                    $racionalSegundo=new Racional($operando2);



                    if($accion=="+"){
                        $racionalPrimero->sumar($racionalSegundo);
                    }elseif($accion=="*"){
                        $racionalPrimero->multiplicar($racionalSegundo);
                    }elseif($accion==":"){
                        $racionalPrimero->dividir($racionalSegundo);
                    }elseif($accion=="-"){
                        $racionalPrimero->restar($racionalSegundo);
                    }

                    $operacionCompleta=$operacion." = ".  $mostrarRacional=$racionalPrimero->__toString(); //para imprimirlo en la tabla, ya que por mi clase Racional se modifica directamente.
                    $racionalPrimero->simplificar();
                    $resultadoSimplificado=$racionalPrimero->__toString();
                ?>

                <div id="contenido">
                <form id="formulario" action="calculadora.php">
                    <fieldset id="reglas">
                        <legend>Reglas de uso de la calculadora</legend>
                        <ul>
                            <li>La calculadora se usa escribiendo la operación completa.</li>
                            <li>La operación será <strong>Operando_1 operación Operando_2.</strong></li>
                            <li>Cada operando puede ser un número <em>positivo</em> entero o racional.</li>
                            <li>Los operadores racionales permitidos son <span style="color: blue;">+ - * :</span> </li>
                            <li>No se deben dejar espacios en blanco entre operandos y operación.</li>
                            <li>Ejemplos:
                                <ul><li>5+4</li><li>5/2:2</li><li>1/4*2/3</li><li>2/7:1/3</li></ul>
                            </li>
                        </ul>
                    </fieldset>

                    <div id="derecha">
                        <fieldset id="operacion">
                            <legend>Establece la operación</legend>
                            <label>Operación:</label>
                            <input type="text" name="operacion" required>
                            <input type="submit" name="" value="Calcular"><br><br>
                            <?php
                                print"<span id='operacionCompleta'> $operacionCompleta</span>";
                            ?>
                        </fieldset>

                        <fieldset id="resultado">
                            <legend>Resultado</legend>
                            <?php
                            print"
                            <table id='tabla' border='1'>
                                <tr id='cabecera'><td class='fila1'>Concepto</td><td>Valores</td></tr>
                                <tr><td class='fila1' >Operando 1</td><td>$operando1</td></tr>
                                <tr><td class='fila1'>Operando 2</td><td>$operando2</td></tr>
                                <tr><td class='fila1'>Operación</td><td>$accion</td></tr>
                                <tr><td class='fila1'>Resultado</td><td>$mostrarRacional</td></tr>
                                <tr><td class='fila1'>Operacion simplificada</td><td>$resultadoSimplificado</td></tr>
                            </table>"
                            ?>
                        </fieldset>
                     </div>
                </form>
            </div>
                <?php
                }
                ?>
        </main>
        <nav></nav>
    </section>
    <footer></footer>
</body>
</html>