<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        table {border:1px solid black; border-collapse:collapse;color:green}
        td, th{padding:5px; width: 70px;}
        input{width: 50px;}


    </style>
</head>
<body>
    <?php if(!$_REQUEST) { ?>
 <h1>Formulario de petición de ventas</h1>
    <form action="">
        <table border=1>
            <tr>
                <th>MES</th>
                <th>VENTAS</th>
            </tr>
            <tr>
                <td>enero</td>
                <td><input type="text" name="enero" id="" required></td>
            </tr>
            <tr>
                <td>febrero</td>
                <td><input type="text" name="febrero" id="" required></td>
            </tr>
            <tr>
                <td>marzo</td>
                <td><input type="text" name="marzo" id="" required></td>
            </tr>
            <tr>
                <td>abril</td>
                <td><input type="text" name="abril" id="" required></td>
            </tr>
            <tr>
                <td>mayo</td>
                <td><input type="text" name="mayo" id="" required></td>
            </tr>
            <tr>
                <td>junio</td>
                <td><input type="text" name="junio" id="" required></td>
            </tr>
            <tr>
                <td>julio</td>
                <td><input type="text" name="julio" id="" required></td>
            </tr>
            <tr>
                <td>agosto</td>
                <td><input type="text" name="agosto" id="" required></td>
            </tr>
            <tr>
                <td>septiembre</td>
                <td><input type="text" name="septiembre" id="" required></td>
            </tr>
            <tr>
                <td>octubre</td>
                <td><input type="text" name="octubre" id="" required></td>
            </tr>
            <tr>
                <td>noviembre</td>
                <td><input type="text" name="noviembre" id="" required></td>
            </tr>
            <tr>
                <td>diciembre</td>
                <td><input type="text" name="diciembre" id="" required></td>
            </tr><tr>
                <td><input type="submit" value="Enviar datos"></td>
                <td><input type="reset" value="Borrar"></td>
            </tr>

        </table>
    </form>

<?php
    } else {
        $ventas = [];
        print "<table border=1>";
        print "<tr><th>MES</th><th>VENTAS</th></tr>";
        foreach ($_REQUEST as $key => $value) {
            $ventas[$key] = $value;
            print"<tr><td>$key</td><td>$value</td></tr>";
        }
        print "</table>";

        print"<br><br>";
    sort($_REQUEST);
    print "<table border=1>";
    print "<tr><th>VENTA MEDIA</th><th>VENTA MÁXIMA</th><th>VENTA MÍNIMA</th></tr>";
    print"<tr><td>".array_sum($_REQUEST)."</td><td>".$_REQUEST[11]."</td><td>".$_REQUEST[0]."</td></tr>";
    print "</table>";
    }

    ?>
<table>

</table>

</body>
</html>