<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header><h1>Consulta de productos</h1></header>
    <main>
        <?php
        if($_REQUEST) {
            include "viewController.php";

            // Miramos a ver si se indica alguna acción en la URL
            if (!isset($_REQUEST['action'])) {
                // No hay acción en la URL. Usamos la acción por defecto (main). Puedes cambiarla por cualquier otra que vaya bien con tu aplicación.
                $action = "showBygama";
            } else {
                // Sí hay acción en la URL. Recuperamos su nombre.
                $action = $_REQUEST['action'];
            }

            // Hacemos lo mismo con el nombre del controlador
            if (!isset($_REQUEST['controller'])) {
                // No hay controlador en la URL. Asignaremos un controlador por defecto (Articles). Por supuesto, puedes cambiarlo por otro que vaya bien con tu aplicación.
                $controllerClassName = "viewController";
            } else {
                // Sí hay controlador en la URL. Recuperamos su nombre.
                $controllerClassName = $_REQUEST['controller'];
            }

            // Instanciamos el controlador e invocamos al método que se llama como la acción
            $controller = new $controllerClassName();
            $controller->{$action}();


        } else {
            // recorremos las gamas para mostrarlas en un <formulario></formulario
            $conexion       = mysqli_connect('localhost', 'root', '', 'jardineria');
            $consulta       = "select gama from gamasproductos";
            $resultconsulta = mysqli_query($conexion, $consulta);

            $nfilas = mysqli_num_rows($resultconsulta);
            if($nfilas > 0) {
                print "<form action='index.php' method='get'>";
                print "<select name='gama'>";
                print "<option value='no' selected disabled >Elige una gama</option>";
                for($i = 0; $i < $nfilas; $i++) {
                    $resultado = mysqli_fetch_assoc($resultconsulta);
                    foreach($resultado as $key => $value) {
                        print "<option value=" . $value . ">$value</option>"; // para imprimir solo el valor, no el nombre de la columna
                    }
                }
                //dar nombre al boton enviar para enviar name ='enviar';
                print "<input type='submit' value='enviar'>
                </select>
            </form>";
                mysqli_close($conexion);
            }
        }

        ?>







    </main>

</body>
</html>