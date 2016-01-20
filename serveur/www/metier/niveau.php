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

	public function __construct($idNiveau, $libelle){
		$this->idNiveau = $idNiveau;
		$this->libelle = $libelle;
	}

	public function __get($property){
		if('idNiveau'==$property){
			return $this->idNiveau;
		}elseif('libelle'==$property){
			return $this->libelle;
		}else{
			return null;
		}
	}

	public function __set($property, $value){
		if('idNiveau'==$property){
			$this->idNiveau = $value;
		}elseif('libelle'==$property){
			$this->libelle = $value;
		}else{
			return;
		}
	}
}