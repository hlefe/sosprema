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

    public static function creerUtilisateur($prenom, $nom, $email, $mot_de_passe, $num_rue, $nom_rue, $code_postal, $ville, $id_groupe, $avatar){
        $utilisateurGateway = new utilisateurGateway();
        $utilisateur = $utilisateurGateway->insererUtilisateur($prenom, $nom, $email, $mot_de_passe, $num_rue, $nom_rue, $code_postal, $ville, $id_groupe, $avatar);
        foreach ($telephones as $key => $value) {
            telephonesGateway::insererTelephone($utilisateur->id_utilisateur, $values);
        }
    }

    public static function supprimerUtilisateur($emailConnexion) {
        $utilisateurGateway = new utilisateurGateway();
        $utilisateurGateway = $utilisateurGateway->supprimerUtilisateur($emailConnexion);
    }

    public static function afficherToutUtilisateur() {
        $utilisateurGateway = new utilisateurGateway();
        $utilisateurGateway = $utilisateurGateway->afficherToutUtilisateur($emailConnexion);
    }
}