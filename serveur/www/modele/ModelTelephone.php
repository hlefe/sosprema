<?php
/**
* Classe ModelContactHopital
*
* Modèle pour Telephone
*/
class ModelTelephone {

	private static function rechercherTelephonesUtilisateur($idContact){
		return TelephoneGatewy::rechercheTelephoneUtilisateur($idContact);
	}

	public static function rechercherTelephonesPourUtilisateur($utilisateur){
		$utilisateur->telephones = self::rechercherTelephoneUtilisateur($utilisateur->userId);
		return $utilisateur;
	}

	public static function ajouterTelephone($utilisateur){
		$intitule = VariableExterne::verifChampOptionnel( 'intitule');
		$numero = VariableExterne::verifChampOptionnel( 'numero');
        if($intitule !="" && $numero != ""){
            TelephoneGateway::ajouterTelephone($intitule,$numero,$utilisateur->userId);
            $utilisateur = ModelGestionUtilisateur::rechercheUtilisateur($utilisateur->email);
            return $utilisateur;
        }
	}

	public static function modifierTelephone($idTelephone){
		$intitule = VariableExterne::verifChampObligatoire('intitule', 'intitule');
		$numero = VariableExterne::verifChampObligatoire('numero', 'numero');
		TelephoneGatewy::modifierTelephone($idTelephone,$intitule,$numero);
	}

	public static function supprimerTelephone($idTelephone){
		TelephoneGateway::supprimerTelephone($idTelephone);
	}

}