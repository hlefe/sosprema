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

    public static function creerUtilisateur($prenom, $nom, $email, $mot_de_passe, $num_rue, $nom_rue, $code_postal, $ville, $id_niveau_utilisateur, $avatar){
        $utilisateurGateway = new utilisateurGateway();
        $utilisateur = $utilisateurGateway->insererUtilisateur($prenom, $nom, $email, $mot_de_passe, $num_rue, $nom_rue, $code_postal, $ville, $id_niveau_utilisateur, $avatar);
    }

    public static function supprimerUtilisateur($emailConnexion) {
        $utilisateurGateway = new utilisateurGateway();
        $utilisateurGateway = $utilisateurGateway->supprimerUtilisateur($emailConnexion);
    }

    public static function afficherToutUtilisateur() {
        $utilisateurGateway = new utilisateurGateway();
        $utilisateurGateway = $utilisateurGateway->afficherToutUtilisateur($emailConnexion);
    }

    public static function modifierUtilisateur($id_utilisateur, $prenom, $nom, $email, $num_rue, $nom_rue, $code_postal, $ville, $id_niveau_utilisateur, $avatar){
        $utilisateurGateway = new utilisateurGateway();
        $utilisateurGateway->modifierUtilisateur($id_utilisateur, $prenom, $nom, $email, $num_rue, $nom_rue, $code_postal, $ville, $id_niveau_utilisateur, $avatar);
        $utilisateur = $utilisateurGateway->rechercheUtilisateurId($id_utilisateur);
        return $utilisateur;
    }

    public static function modifierMotDePasse($idUser, $newMDR){
        $utilisateurGateway = new utilisateurGateway();
        $utilisateur = $utilisateurGateway->modifierMotDePasse($idUser, $newMDR);
    }

    public static function modifierNiveau($user, $newNiveau){
        $utilisateurGateway = new utilisateurGateway();
        $utilisateur = $utilisateurGateway->modifierNiveau($user, $newNiveau);
    }
}