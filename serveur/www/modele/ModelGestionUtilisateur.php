<?php

class ModelGestionUtilisateur {

    public static function rechercheUtilisateur($email) {
        $utilisateur = UtilisateurGateway::rechercheUtilisateurEmail($email);
        return $utilisateur;
    }

    public static function creerUtilisateur(){
        
        $nom = VariableExterne::verifChampObligatoire('nom','nom');
        $prenom =VariableExterne::verifChampObligatoire('prenom','prenom');
        $motDePasse = VariableExterne::verifChampPassword('mot de passe','motDePasse');
        $email = VariableExterne::verifChampEmail('email', null);

        $numRue=VariableExterne::verifChampOptionnel('numRue');
        $nomRue=VariableExterne::verifChampOptionnel('nomRue');
        $codePostal=VariableExterne::verifChampOptionnel('codePostal');
        $nomVille=VariableExterne::verifChampOptionnel('nomVille');
        $nomRegion=VariableExterne::verifChampOptionnel('nomRegion');
        $nomDepartement=VariableExterne::verifChampOptionnel('nomDepartement');
        $dateDeNaissance=VariableExterne::verifChampOptionnel('dateDeNaissance');
        $avatar=VariableExterne::verifChampOptionnel('avatar');     
        $profession=VariableExterne::verifChampOptionnel('profession');
        $divers=VariableExterne::verifChampOptionnel('divers');

        if(isset($_POST['libelle_niveau']))
            $idNiveau=ModelNiveau::rechercherId(Nettoyage::nettoyerChaine($_POST['libelle_niveau']));

            if($idNiveau==false){
                $vueErreur[] = "Aucun niveau utilisateur correspondant à ce libelle";
                return;
            } else{
            $idNiveau=ModelNiveau::rechercherId('utilisateur');
        }
        
 // Faudrait peut-être que ces fonctions retournent la référence du lieu:
        ModelGestionLieu::verifierPresenceLieu('ville', $nomVille);
        ModelGestionLieu::verifierPresenceLieu('region', $nomRegion);
        ModelGestionLieu::verifierPresenceLieu('departement', $nomDepartement);
 // Puis créer un métier Adresse, afin de créer une adresse et mettre les infos ci-dessus dedans...  
 // en attendant je suis obligé de mettre une adresse à 0: 
        $idAddress= 0;
// Pareil pour les familles ?
        $idFamille =null;

        $utilisateur = UtilisateurGateway::insererUtilisateur($email,$nom,$prenom,$motDePasse,$dateDeNaissance,
        $profession,$divers,$avatar,$idNiveau,$idFamille,$idAddress);
    }

    public static function modifierUtilisateur($utilisateurModifie){
        $nom = VariableExterne::verifChampObligatoire('nom','nom');
        $prenom =VariableExterne::verifChampObligatoire('prenom','prenom');
        $email = VariableExterne::verifChampEmail('email', $utilisateurModifie->email);
        $numRue=VariableExterne::verifChampOptionnel('numRue');
        $nomRue=VariableExterne::verifChampOptionnel('nomRue');
        $codePostal=VariableExterne::verifChampOptionnel('codePostal');
        $nomVille=VariableExterne::verifChampOptionnel('nomVille');
        $dateDeNaissance=VariableExterne::verifChampOptionnel('dateDeNaissance');
        $avatar=VariableExterne::verifChampAvatar('avatar', $utilisateurModifie->avatar);     
        $profession=VariableExterne::verifChampOptionnel('profession');
        $divers=VariableExterne::verifChampOptionnel('divers');


        if(isset($_POST['libelle_niveau'])){
            $idNiveau=ModelNiveau::rechercherId(Nettoyage::nettoyerChaine($_POST['libelle_niveau']));

            if($idNiveau==false){
                throw new Exception("Aucun niveau utilisateur ne correspond à se libelle", 1);
            }
        }
        else{
            $idNiveau = $utilisateurModifie->idNiveau;
        }
        

        
        
        ModelGestionLieu::verifierPresenceLieu('ville', $nomVille);
        //Gérer la création de l'adresse !!! 
        $idAdresse = null;
        
        UtilisateurGateway::modifierUtilisateur($utilisateurModifie->userId,$email,$nom,$prenom,$dateDeNaissance,
        $profession,$divers,$avatar,$idNiveau,$utilisateurModifie->idFamille,$idAdresse);

        $utilisateur = UtilisateurGateway::rechercheUtilisateurId($utilisateurModifie->userId);        
        
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
        return $utilisateur;
    }

    public static function verifierEmailNonPresent($email){
        if(UtilisateurGateway::rechercheUtilisateurEmail($email) != false){
            return true;
        }
        return false;
    }
    
    public static function modifierSafeUserInfo($utilisateurModifie){
        $vueErreur[] = "Aucun niveau utilisateur correspondant à ce libelle";
         if(isset($_POST['libelle_niveau'])){
            $idNiveau=ModelNiveau::rechercherId(Nettoyage::nettoyerChaine($_POST['libelle_niveau']));
            if($idNiveau==false){
                $vueErreur[] = "Aucun niveau utilisateur correspondant à ce libelle";
                return;
            } else{
                $utilisateurModifie = self::modifierNiveau($utilisateurModifie, $idNiveau);
            }
        }
        
        $newMDP = VariableExterne::verifChampPassword('nouveau mot de passe','newMDP');         
        if (!$newMDP == "")
            UtilisateurGateway::modifierMotDePasse($utilisateurModifie->userId, $newMDP);
        $utilisateur = UtilisateurGateway::rechercheUtilisateurId($utilisateurModifie->userId);
        return $utilisateur;
    }
}