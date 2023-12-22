<?php

class Menu
{
    private $dia;
    private $fecha;
    private $primerosPlatos = [];
    private $segundosPlatos = [];
    private $postres        = [];

    public function __construct($dia, $fecha)
    {
        $this->dia   = $dia;
        $this->fecha = $fecha;
    }

    public function AgregarPrimer($plato)
    {
        array_push($this->primerosPlatos, $plato);
    }
    public function AgregarSegundo($plato)
    {
        array_push($this->segundosPlatos, $plato);
    }
    public function AgregarPostre($plato)
    {
        array_push($this->postres, $plato);
    }

    public function MostrarMenu()
    {
        print"<table border=1>";
        print"<tr> <th>PRIMEROS PLATOS</th> </tr>";
        foreach ($this->primerosPlatos as $key => $plato) {
            print"<tr> <td> $plato</td> </tr>";
        }
        print"<tr> <th>SEGUNDOS PLATOS</th> </tr>";
        foreach ($this->segundosPlatos as $key => $plato) {
            print"<tr> <td> $plato</td> </tr>";
        }
        print"<tr> <th>POSTRES</th> </tr>";
        foreach ($this->postres as $key => $postre) {
            print"<tr> <td>$postre</td> </tr>";
        }
        print "</table>";
    }

}
