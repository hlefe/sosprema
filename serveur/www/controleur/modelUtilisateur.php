<?php

/**
 * cette classe permettra de gérer l'utilisateur qui est connecté
 * @author Nico
 */

class modelUtilisateur {

    public static function creationUtilisateurConnecter($emailConnexion, $passwordConnexion) {
        $utilisateurGateway = new utilisateurGateway();
        $utilisateur = $utilisateurGateway->rechercheUtilisateurConnexion($emailConnexion, $passwordConnexion);
        return $utilisateur;

    }

    public static function creerUtilisateur($prenom, $nom, $email, $mot_de_passe, $adresse, $id_groupe, $avatar, $telephones){
        $utilisateur = utilisateurGateway::insererUtilisateur($prenom, $nom, $email, $mot_de_passe, $adresse, $id_groupe, $avatar);
        foreach ($telephones as $key => $value) {
            telephonesGateway::isererTelephone($utilisateur->id_utilisateur, $values);
        }
        
    }
}