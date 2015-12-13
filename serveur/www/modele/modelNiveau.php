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
}