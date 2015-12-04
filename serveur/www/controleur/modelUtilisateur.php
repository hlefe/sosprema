<?php

/**
 * cette classe permettra de gérer l'utilisateur qui est connecté
 * @author Nico
 */

class modelUtilisateur {

    public static function creationSessionUtilisateur($emailConnexion, $passwordConnexion) {

        $utilisateur = utilisateurGateway::rechercheUtilisateurConnexion($emailConnexion, $passwordConnexion);
        return $utilisateur;

    }

    
}