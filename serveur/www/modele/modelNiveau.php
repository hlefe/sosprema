<?php

/**
 * cette classe permettra de gérer l'utilisateur qui est connecté
 * @author Nico
 */

class modelNiveau {
	public static function rechercherLibelle($id_niveau){
		$niveauGateway = new niveauGateway();
		$libelle = $niveauGateway->rechercherLibeller($id_niveau);
		return $libelle;
	}

	public static function rechercherId($libelle){
		$niveauGateway = new niveauGateway();
		$id = $niveauGateway->rechercherId($libelle);
		return $id;
	}

	public static function getAll(){
		$niveauGateway = new niveauGateway();
		return $niveauGateway->getAll();
	}
}