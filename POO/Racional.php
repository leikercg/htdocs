<?php
class Racional
{
    private $numerador;
    private $denominador;

    public function __construct($numerador=null, $denominador=null)
    {
        if($numerador==null && $denominador==null){
            $this->numerador=1;
            $this->denominador=1;
        }elseif(is_numeric($numerador)){
            $this->numerador=$numerador;
            $this->denominador=1;
        }elseif(is_numeric($numerador) && is_numeric($denominador)){
            $this->numerador=$numerador;
            $this->denominador=$denominador;
        }elseif(is_string($numerador)){
            $separados = explode("/",$numerador);
            $this->numerador=$separados[0];
            $this->denominador=$separados[1];
        }
        }
    public function __toString(){
        return $this->numerador."/ ".$this->denominador;
    }

    public function simplificar(){
        // Encuentra el menor entre el numerador y el denominador
        $min = min($this->numerador, $this->denominador);

        // Itera desde el menor hasta 2 para encontrar divisores comunes
        for ($i = $min; $i >= 2; $i--) {
            // Si ambos son divisibles por $i, simplifica la fracción
            if ($this->numerador % $i == 0 && $this->denominador % $i == 0) {
                $this->numerador /= $i;
                $this->denominador /= $i;
            }
        }

        }


    public function sumar(Racional $otroRacioanl){
        $otroDenominador=$otroRacioanl->getDenominador();
        $otroNumerador=$otroRacioanl->getNumerador();

        $numerador=$this->getNumerador();
        $denominador=$this->getDenominador();


        $numerador=$numerador*$otroDenominador;
        $otroNumerador=$otroNumerador*$denominador;

        $this->setDenominador($denominador*$otroDenominador);
        $this->setNumerador($numerador+$otroNumerador);


    }

public function getNumerador() {return $this->numerador;}

public function getDenominador() {return $this->denominador;}

public function setNumerador( $numerador): void {$this->numerador = $numerador;}

public function setDenominador( $denominador): void {$this->denominador = $denominador;}




}

?>