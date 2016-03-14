<?php
/**
* Classe ModelContactHopital
*
* Modèle pour Session
*/
class ModelSession {
	
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