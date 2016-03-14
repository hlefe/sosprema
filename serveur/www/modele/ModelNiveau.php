<?php
/**
* Classe ModelNiveau
*
* Modèle pour Niveau
* @package modele
*/
class ModelNiveau {
	public static function rechercherNom($id_niveau){
		return NiveauGateway::rechercherNom($id_niveau);	
	}

	public static function rechercherId($libelle){
		return NiveauGateway::rechercheridNiveau($libelle);
	}

	public static function getAll(){
		return NiveauGateway::getAll();
	}
}