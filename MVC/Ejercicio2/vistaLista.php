<?php
$clientes=$data["clientes"];
if($clientes!=null || $clientes!=0) {
    print "<TABLE border='1'>";
    print "<TR>";
    print "<TH>Codigo</TH>";
    print "<TH>Nombre</TH>";
    print "<TH>Nombre de contacto</TH>";
    print "</TR>";

    foreach ($clientes as $key => $fila) {
        print"<tr><td>".($fila[0])."</td><td>$fila[1]</td><td>$fila[2]</td></tr>";
    }
    print"</table>";
}
