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
    public static function rechercheUtilisateur($email) {
        $utilisateurGateway = new utilisateurGateway();
        $utilisateur = $utilisateurGateway->rechercheUtilisateurEmail($email);
        return $utilisateur;

    }
    public static function creerUtilisateur($email,$nom,$prenom,$motDePasse,$dateDeNaissance,$nomRue,$numRue,
        $codePostal,$profession,$divers,$avatar=null,$idNiveau,$idFamille,$nomVille,$nomDepartement,$nomRegion){
        
        $region = new regionGateway();
        $ville = new villeGateway();
        $departement = new departementGateway();
        if($region->rechercherRegion($nomRegion)==NULL){
            $region->ajouterRegion($nomRegion);
        }
        if(!$nomVille == ""){
            if($ville->rechercherVille($nomVille)==NULL){
                echo $nomVille;
                $ville->ajouterVille($nomVille);
            }
        }
        if($departement->rechercherDepartement($nomDepartement)==NULL){
            $departement->ajouterDepartement($nomDepartement);
        }
        $utilisateurGateway = new utilisateurGateway();
        $utilisateur = $utilisateurGateway->insererUtilisateur($email,$nom,$prenom,$motDePasse,$dateDeNaissance,$nomRue,$numRue,
        $codePostal,$profession,$divers,$avatar,$idNiveau,$idFamille,$nomVille,$nomDepartement,$nomRegion);
    }

    public static function modifierUtilisateur($id_utilisateur,$email,$nom,$prenom,$dateDeNaissance,$nomRue,$numRue,
        $codePostal,$profession,$divers,$avatar,$idNiveau,$idFamille,$nomVille,$nomDepartement,$nomRegion){
        $region = new regionGateway();
        $ville = new villeGateway();
        $departement = new departementGateway();
        if($region->rechercherRegion($nomRegion)==NULL){
            $region->ajouterRegion($nomRegion);
        }
        if($ville->rechercherVille($nomVille)==NULL){
            $ville->ajouterVille($nomVille);
        }
        if($departement->rechercherDepartement($nomDepartement)==NULL){
            $departement->ajouterDepartement($nomDepartement);
        }
        $utilisateurGateway = new utilisateurGateway();
        $utilisateurGateway->modifierUtilisateur($id_utilisateur,$email,$nom,$prenom,$dateDeNaissance,$nomRue,$numRue,
        $codePostal,$profession,$divers,$avatar,$idNiveau,$idFamille,$nomVille,$nomDepartement,$nomRegion);
        $utilisateur = $utilisateurGateway->rechercheUtilisateurId($id_utilisateur);
        return $utilisateur;
    }


    public static function supprimerUtilisateur($emailConnexion) {
        $utilisateurGateway = new utilisateurGateway();
        return $utilisateurGateway->supprimerUtilisateur($emailConnexion);
    }

    public static function afficherToutUtilisateur() {
        $utilisateurGateway = new utilisateurGateway();
        $utilisateurs = $utilisateurGateway->afficherToutUtilisateur();
        return $utilisateurs;
    }


    public static function modifierMotDePasse($idUser, $newMDR){
        $utilisateurGateway = new utilisateurGateway();
        $utilisateurGateway->modifierMotDePasse($idUser, $newMDR);
        $utilisateur = $utilisateurGateway->rechercheUtilisateurId($idUser);
        return $utilisateur;
    }

    public static function modifierNiveau($user, $newNiveau){
        $utilisateurGateway = new utilisateurGateway();
        $utilisateur = $utilisateurGateway->modifierNiveau($user, $newNiveau);
    }

    public static function verifierEmailNonPresent($email){
        $utilisateurGateway = new utilisateurGateway();
        if($utilisateurGateway->rechercheUtilisateurEmail($email) != false){
            return true;
        }
        return false;
    }
}