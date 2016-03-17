<?php
/**
* Classe ModelNiveau
*
* Modèle pour Niveau
* @package modele
*/
class ModelNiveau {

	/**
    * Fonction de recherche du nom du niveau de droit. 
    * 
    * Permet de le nom du niveau de droit.
    * @param id_niveau correspond au niveau dont on recherche l'intitulé.
    * @return le nom du niveau ou faux s'il n'existe pas.
    */
	public static function rechercherNom($id_niveau){
		return NiveauGateway::rechercherNom($id_niveau);	
	}

	/**
    * Fonction de recherche de l'id d'un niveau par son nom. 
    * 
    * Permet de rechercher l'id d'un niveau par son nom.
    * @param libelle correspond à l'intitulé du niveau.
    * @return l'id du niveau recherché.
    */
	public static function rechercherId($libelle){
		return NiveauGateway::rechercheridNiveau($libelle);
	}

	/**
    * Fonction de récupération de l'ensemble des niveau. 
    * 
    * Permet de récupérer l'ensemble des niveau de droit.
    * @return l'ensemble des niveau d'utilisateur.
    */
	public static function getAll(){
		return NiveauGateway::getAll();
	}
}