<?php
/**
* Classe Adresse
*
* Métier de l'Adresse
* @package metier
*/
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

        foreach ($param as $key=>$value){
            $this->$key = $value;
        }
    }
}