<?php

class Persona
{
    protected $nombre;/*Con protected se pueden usar estos atributos en los descendientes*/
    private $apellido;
    private $edad;/*con private no se pueden usar estos atribbutos desde los descendientes, solo pueden ser accedidos mediante metodos publicos (getters y setters)*/
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

class Empleado extends Persona
{
    private $puesto;
    private $sueldo;

    public function __construct(string $nombre, string $apellido, int $edad,$puesto,int $sueldo){
        parent::__construct( $nombre,  $apellido,  $edad);
        $this->puesto=$puesto;
        $this->sueldo=$sueldo;
    }
	public function getPuesto() {return $this->puesto;}

	public function getSueldo() {return $this->sueldo;}


    //no hace falta volver a declarar los metodos ya declarados en el padre,
    //a no ser que se desee sobre cargar metodos



	public function setPuesto( $puesto): void {$this->puesto = $puesto;}

	public function setSueldo( $sueldo): void {$this->sueldo = $sueldo;}



    public function presentar(){
if($this->sueldo > 2000) {
    print "{$this->nombre} {$this->getApellido()}, {$this->getPuesto()}, debe pagar impuestos. <br><br>"; //en el caso de nombre podemos acceder directamente ya que es protected, pero en el caso del apellido solo podemos acceder através del metodo getApellido() al ser private*/
}else{
    print "{$this->nombre} {$this->getApellido()}, {$this->getPuesto()}, no debe pagar impuestos. <br><br>";
}
    }

}
