<?php

/**
 * cette classe permettra de gérer l'utilisateur qui est connecté
 * @author Nico
 */

class ModelGestionUtilisateur {

    public static function rechercheUtilisateur($email) {
        $utilisateur = UtilisateurGateway::rechercheUtilisateurEmail($email);
        return $utilisateur;
    }

    public static function creerUtilisateur(){
        
        $nom = variableExterne::verifChampObligatoire('nom','nom');
        $prenom =variableExterne::verifChampObligatoire('prenom','prenom');
        $motDePasse = variableExterne::verifChampObligatoire('mot de passe','motDePasse');
        $email = variableExterne::verifChampEmail('email', null);

        $numRue=variableExterne::verifChampOptionnel('numRue');
        $nomRue=variableExterne::verifChampOptionnel('nomRue');
        $codePostal=variableExterne::verifChampOptionnel('codePostal');
        $nomVille=variableExterne::verifChampOptionnel('nomVille');
        $nomRegion=variableExterne::verifChampOptionnel('nomRegion');
        $nomDepartement=variableExterne::verifChampOptionnel('nomDepartement');
        $dateDeNaissance=variableExterne::verifChampOptionnel('dateDeNaissance');
        $avatar=variableExterne::verifChampOptionnel('avatar');     
        $profession=variableExterne::verifChampOptionnel('profession');
        $divers=variableExterne::verifChampOptionnel('divers');

        if(isset($_POST['libelle_niveau']))
            $idNiveau=ModelNiveau::rechercherId(nettoyage::nettoyerChaine($_POST['libelle_niveau']));

            if($idNiveau==false){
                $vueErreur[] = "Aucun niveau utilisateur correspondant à se libelle";
                require_once('vue/ajoutUtilisateur.php');
                return;
            } else{
            $idNiveau=ModelNiveau::rechercherId('utilisateur');
        }

        ModelGestionLieu::verifierPresenceLieu('VilleGateway', $nomVille);
        ModelGestionLieu::verifierPresenceLieu('RegionGateway', $nomRegion);
        ModelGestionLieu::verifierPresenceLieu('DepartementGateway', $nomDepartement);

        $utilisateur = UtilisateurGateway::insererUtilisateur($email,$nom,$prenom,$motDePasse,$dateDeNaissance,$nomRue,$numRue,
        $codePostal,$profession,$divers,$avatar,$idNiveau,$idFamille,$nomVille,$nomDepartement,$nomRegion);
    }

    public static function modifierUtilisateur($utilisateurModifie){
        
        $nom = variableExterne::verifChampObligatoire('nom','nom');
        $prenom =variableExterne::verifChampObligatoire('prenom','prenom');
        $email = variableExterne::verifChampEmail('email', $utilisateurConnecter->email);

        $numRue=variableExterne::verifChampOptionnel('numRue');
        $nomRue=variableExterne::verifChampOptionnel('nomRue');
        $code_postal=variableExterne::verifChampOptionnel('codePostal');
        $nomVille=variableExterne::verifChampOptionnel('nomVille');
        $nomRegion=variableExterne::verifChampOptionnel('nomRegion');
        $nomDepartement=variableExterne::verifChampOptionnel('nomDepartement');
        $dateDeNaissance=variableExterne::verifChampOptionnel('dateDeNaissance');
        $avatar=variableExterne::verifChampOptionnel('avatar');     
        $profession=variableExterne::verifChampOptionnel('profession');
        $divers=variableExterne::verifChampOptionnel('divers');


        if(isset($_POST['libelle_niveau']))
            $idNiveau=ModelNiveau::rechercherId(nettoyage::nettoyerChaine($_POST['libelle_niveau']));

            if($idNiveau==false){
                $vueErreur[] = "Aucun niveau utilisateur correspondant à se libelle";
                require_once('vue/profil.php');
                return;
            }
        else{
            $idNiveau = $_SESSION['utilisateurConnecter']->idNiveau;
        }

        ModelGestionLieu::verifierPresenceLieu('VilleGateway', $nomVille);
        ModelGestionLieu::verifierPresenceLieu('RegionGateway', $nomRegion);
        ModelGestionLieu::verifierPresenceLieu('DepartementGateway', $nomDepartement);

        UtilisateurGateway::modifierUtilisateur($id_utilisateur,$email,$nom,$prenom,$dateDeNaissance,$nomRue,$numRue,
        $codePostal,$profession,$divers,$avatar,$idNiveau,$idFamille,$nomVille,$nomDepartement,$nomRegion);

        $utilisateur = UtilisateurGateway::rechercheUtilisateurId($id_utilisateur);        
        
        return $utilisateur;
    }


    public static function supprimerUtilisateur($emailConnexion) {
        return UtilisateurGateway::supprimerUtilisateur($emailConnexion);
    }

    public static function afficherToutUtilisateur() {
        $utilisateurs = UtilisateurGateway::afficherToutUtilisateur();
        return $utilisateurs;
    }


    public static function modifierMotDePasse($utilisateur){

        $oldMDP = VariableExterne::verifChampPassword('ancien mot de passe','oldMDP');
        if(!$_SESSION['utilisateurConnecter']->verifierMotDePasse($oldMDP)){
            throw new Exception("Erreur de saisie pour votre ancien mot de passe.", 1); 
        }
 
        $newMDP = VariableExterne::verifChampPassword('nouveau mot de passe','newMDP');
                    
        $newMDPVerif = VariableExterne::verifChampPassword('confirmation du nouveau mot de passe','newMDPVerif');
        
        if($newMDP==$newMDPVerif){
            $motDePasse= $newMDP;
        }else{
            throw new Exception("Le nouveau et la confirmation de mot de passe sont incorecte.", 1);
        }
           
        UtilisateurGateway::modifierMotDePasse($utilisateur->userId, $motDePasse);
        $utilisateur = UtilisateurGateway::rechercheUtilisateurId($utilisateur->userId);
        return $utilisateur;
    }

    public static function modifierNiveau($user, $newNiveau){
        $utilisateur = UtilisateurGateway::modifierNiveau($user, $newNiveau);
    }

    public static function verifierEmailNonPresent($email){
        if(UtilisateurGateway::rechercheUtilisateurEmail($email) != false){
            return true;
        }
        return false;
    }
}