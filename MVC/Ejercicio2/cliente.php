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
    public static function getListaBygama(){
        $db = new Db();
        $gama=$_REQUEST["gama"];

        $db->createConnection("localhost", "root","","jardineria");

        $clientes=$db->dataQuery("SELECT codigoproducto, nombre, cantidadenstock from productos where gama = '$gama'");
        $db->closeConnection();

        return $clientes;
    }
}
