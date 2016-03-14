<?php
/**
* Classe telephone
*
* Métier de telephone
*/
class telephone {

    private $idTelephone;
    private $type;
    private $numero;

    public function __get($property) {
        return $this->$property;
    }
    
    public function __set($property, $value) {
        $this->$property=$value;
    }

    public function __construct($idTelephone,$type, $numero) {
        $this->idTelephone = $idTelephone;
        $this->type = $type;
        $this->numero = $numero;
    }

}
