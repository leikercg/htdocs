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

    public function MostrarPrimeros()
    {
     foreach ($this->primerosPlatos as $key => $value) {
        print"<p>$value</p>";
     }
    }
    public function MostrarSegundos()
    {
     foreach ($this->segundosPlatos as $key => $value) {
        print"<p>$value</p>";
     }
    }
    public function MostrarPostres()
    {
     foreach ($this->postres as $key => $value) {
        print"<p>$value</p>";
     }
    }
    public function mostrarFecha() {
        print"<div id='subtitulo'>Menú del $this->dia, $this->fecha</div>";
    }

    public function presentacion() {
        print "<img src='imgSup.png' class='decoracion'>";
        print "<div id='presentacion'>";
        print "<h3>Menú del día</h3>";
        print "<h4>$this->dia, $this->fecha</h4>";
        print "<br>";
        print "<h4>Primeros platos</h4>";
        $this->MostrarPrimeros();
        print "<br>";
        print "<h4>Segundos platos</h4>";
        $this->MostrarSegundos();
        print "<br>";
        print "<h4>Postres</h4>";
        $this->MostrarPostres();

        print "</div>";
        print "<img src='imgInf.png' class='decoracion'>";
    }
    public function setDia( $dia): void {$this->dia = $dia;}

	public function setFecha( $fecha): void {$this->fecha = $fecha;}

	public function getDia() {return $this->dia;}

	public function getFecha() {return $this->fecha;}



}
