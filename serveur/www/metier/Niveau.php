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
class niveau {
	private $idNiveau;
	private $libelle;

//Getter
    public function __get($property) {
        //Utilisation d'une variable dynamique   
        return $this->$property;
    }

//Setter
    public function __set($property, $value) {
        //Utilisation d'une variable dynamique 
        $this->$property = $value;
    }

//Constructeur
    public function __construct($param) {
        foreach ($param as $key=>$value){
            //Utilisation d'une variable dynamique
            $this->$key = $value;
        }
    }
}