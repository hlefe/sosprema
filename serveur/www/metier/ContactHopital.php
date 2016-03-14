<?php
/**
* Classe ContactHopital
*
* Métier de ContactHopital
* @package metier
*/
class ContactHopital {
	private $idContactHopital;
	private $idHopital;
	private $nom;
	private $prenom;
	private $profession;
    private $numero;

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