<?php
/**
* Classe ModelContactHopital
*
* Modèle pour Session
* @package modele
*/
class ModelSession {
	
    /**
    * Fonction de création de la session de l'utilisateur connecté. 
    * 
    * Permet de créer la session de l'utilisateur connecté.
    * @return utilisateurConnecter correspond à l'utilisateur qui vient de se connecter.
    */
	public static function creationUtilisateurConnecter() {
        $emailConnexion = VariableExterne::verifChampEmail('emailConnexion', 'connexion');
        $passwordConnexion = VariableExterne::verifChampPassword('mot de passe', 'passwordConnexion');
        $utilisateurConnecter = UtilisateurGateway::rechercheUtilisateurConnexion($emailConnexion, $passwordConnexion);
        if($utilisateurConnecter == false){
            throw new Exception("Erreur de login ou de mot de passe.", 1);
        }
        
        $_SESSION['utilisateurConnecter'] = $utilisateurConnecter;
        return $utilisateurConnecter;
    }

}