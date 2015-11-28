<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of telephone
 *
 * @author Nico
 */
class telephone {

    private $type;
    private $numero;

    public function __get($property) {
        if ('type' == $property) {
            return $this->type;
        } if ('numero' == $property) {
            return $this->numero;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }

    public function __set($property, $value) {
        if ('type' == $property) {
            $this->type = $value;
        } if ('numero' == $property) {
            $this->numero = $value;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }

    public function __construct($type, $numero) {
        $this->type = $type;
        $this->numero = $numero;
    }

}
