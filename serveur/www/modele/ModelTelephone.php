<?php
/**
* Classe ModelContactHopital
*
* Modèle pour Telephone
* @package modele
*/
class ModelTelephone {

	/**
    * Fonction de recherche des numéros de téléphone d'un utilisateur. 
    * 
    * Permet de rechercher les numéros de téléphone d'un utilisateur.
    * @param idContact correspond à l'id du contact concerné.
    * @return l'ensemble des numéros de téléphones.
    */
	private static function rechercherTelephonesUtilisateur($idContact){
		return TelephoneGatewy::rechercheTelephoneUtilisateur($idContact);
	}

	/**
    * Fonction de recherche des numéros de téléphone pour un utilisateur. 
    * 
    * Permet de rechercher les numéros de téléphone d'un utilisateur et de les lui attribuer.
    * @param utilisateur correspond à l'utilisateur concerné.
    * @return utilisateur correspond à l'utilisateur modifié.
    */
	public static function rechercherTelephonesPourUtilisateur($utilisateur){
		$utilisateur->telephones = self::rechercherTelephoneUtilisateur($utilisateur->userId);
		return $utilisateur;
	}

	/**
	* Fonction d'ajout du numéro de téléphone d'un utilisateur. 
    * 
    * Permet d'ajouter un numéro de téléphone d'un utilisateur.
    * @param utilisateur correspond à l'utilisateur à qui l'on vas ajouter le numéro.
    * @return utilisateur correspond à l'utilisateur modifié avec le nouveau numéro.
    */
	public static function ajouterTelephone($utilisateur){
		$intitule = VariableExterne::verifChampOptionnel( 'intitule');
		$numero = VariableExterne::verifChampOptionnel( 'numero');
        if($intitule !="" && $numero != ""){
            TelephoneGateway::ajouterTelephone($intitule,$numero,$utilisateur->userId);
            $utilisateur = ModelGestionUtilisateur::rechercheUtilisateur($utilisateur->email);
            return $utilisateur;
        }
	}

	/**
	* Fonction de modification du numéro de téléphone d'un utilisateur. 
    * 
    * Permet de modifier le numéro de téléphone d'un utilisateur.
    * @param idTelephone correspond à l'id du téléphone à modifier.
    */
	public static function modifierTelephone($idTelephone){
		$intitule = VariableExterne::verifChampObligatoire('intitule', 'intitule');
		$numero = VariableExterne::verifChampObligatoire('numero', 'numero');
		TelephoneGatewy::modifierTelephone($idTelephone,$intitule,$numero);
	}

	/**
	* Fonction de supression du numéro de téléphone d'un utilisateur. 
    * 
    * Permet de suprimer un numéro de téléphone.
    * @param idTelephone correspond à l'id du téléphone qui va être suprimer.
    */
	public static function supprimerTelephone($idTelephone){
		TelephoneGateway::supprimerTelephone($idTelephone);
	}

}