<?php
include ("db.php");
class Cliente
{
    public static function getLista()
    {
        $db = new Db();

        $db->createConnection("localhost", "root","","jardineria");

        $clientes=$db->dataQuery("SELECT codigocliente, nombrecliente, nombrecontacto from clientes");
        $db->closeConnection();

        return $clientes;
    }
}
