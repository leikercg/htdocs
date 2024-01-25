<?php

// Controlador. Debería tener un método por cada posible valor de la variable "action".
include "view.php";
include "cliente.php";

class viewController
{
    public function showAll()
    {
        $data['clientes'] = Cliente::getLista();
        View::show("vistalista", $data);
    }

    // Añadir a partir de aquí un método por cada posible valor de la variable "action"

}

?>