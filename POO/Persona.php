<?php

class Persona
{
    protected $nombre;
    protected $apellido;
    private $edad;
    public function __construct(string $nombre, string $apellido, int $edad)
    {
        $this->nombre   = $nombre;
        $this->apellido = $apellido;
        $this->edad     = $edad;
    }
     function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }
    public function getEdad()
    {
        return $this->edad;
    }
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }
}

class Empleada extends Persona
{
    private $puesto;
    private $sueldo;

    public function __construct(string $nombre, string $apellido, int $edad,$puesto,int $sueldo){
        parent::__construct( $nombre,  $apellido,  $edad);
        $this->puesto=$puesto;
        $this->sueldo=$sueldo;
    }

    public function presentar(){
if($this->sueldo > 2000) {
    print " me llamo {$this->nombre} {$this->apellido} y tengo que pagar impuestos";
}else{
    print " me llamo {$this->nombre} {$this->apellido} y NO tengo que pagar impuestos";
}
    }

}
