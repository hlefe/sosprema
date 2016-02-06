<?php

class telephone {

    private $type;
    private $numero;

    public function __get($property) {
        return $this->$property;
    }

    public function __set($property, $value) {
        $this->$property=$value;
    }

    public function __construct($type, $numero) {
        $this->type = $type;
        $this->numero = $numero;
    }

}
