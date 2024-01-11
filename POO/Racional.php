<?php
class Racional
{
    private $numerador;
    private $denomidor;

    public function __construct($numerador, $denomidor)
    {
        $this->numerador = $numerador;
        $this->denomidor = $denomidor;
    }
    public function __construct()  {
        $this->denomidor=1;
        $this ->numerador=1;

    }
}

?>