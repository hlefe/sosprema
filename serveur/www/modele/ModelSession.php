<?php

class ModelSession {
	
	public static function creationUtilisateurConnecter() {
        $emailConnexion = VariableExterne::verifChampEmail('emailConnexion', null);
        $passwordConnexion = VariableExterne::verifChampPassword('mot de passe', 'passwordConnexion');
        $utilisateurConnecter = UtilisateurGateway::rechercheUtilisateurConnexion($emailConnexion, $passwordConnexion);
        if($utilisateurConnecter != false){
        	$_SESSION['utilisateurConnecter'] = $utilisateurConnecter;
        }
        return $utilisateurConnecter;
    }

}