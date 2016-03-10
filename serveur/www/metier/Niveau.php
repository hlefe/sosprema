<?php

class niveau {
	private $idNiveau;
	private $libelle;

	public function __construct($idNiveau, $libelle){
		$this->idNiveau = $idNiveau;
		$this->libelle = $libelle;
	}

	public function __get($property){
		return $this->$property;
	}

	public function __set($property, $value){
		$this->$property = $value;
	}
}