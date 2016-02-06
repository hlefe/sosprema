<?php

class Adresse {
	private $nomRue;
	private $numRue;
	private $codePostal;
	private $nomVille;
	private $nomDepartement;
	private $nomRegion;

	public function __get($property) {
        return $this->$property;
    }

    public function __set($property, $value) {
        $this->property = $value;
    }

    public function __construct($param) {
         $this->$key = $value;
    }
}