
<?php
if($clientes > 0) {

print "<table border='1'>";
print "<tr> <th>Código</th> <th>Nombre</th> <th>stock</th> </tr>";
    print "<tr>";
    foreach($clientes as $key => $value) {
        print "<td>$value</td>";
    }
    print "</tr>";

print "</table>";
} else {
print "<h3>No hay productos en la gama de $gama.</h3>";
}

print '<a href="index.php">Nueva consulta</a>';

?>