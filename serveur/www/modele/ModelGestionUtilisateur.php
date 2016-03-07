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
        
        $idAdresse = ModelGestionLieu::gestionAjoutModifAdresse();

        $utilisateur = UtilisateurGateway::insererUtilisateur($email,$nom,$prenom,$motDePasse,$dateDeNaissance,
        $profession,$divers,$avatar,$idNiveau,$idAdresse);
        if(isset($_REQUEST['intitule']) && isset($_REQUEST['numero'])){
            ModelTelephone::ajouterTelephone($utilisateur);
        }
    }

    public static function modifierUtilisateur($utilisateurModifie){
        $nom = VariableExterne::verifChampObligatoire('nom','nom');
        $prenom =VariableExterne::verifChampObligatoire('prenom','prenom');
        $email = VariableExterne::verifChampEmail('email', $utilisateurModifie->email);
        $dateDeNaissance=VariableExterne::verifChampOptionnel('dateDeNaissance');
        $avatar=VariableExterne::verifChampAvatar('avatar', $utilisateurModifie->avatar);     
        $profession=VariableExterne::verifChampOptionnel('profession');
        $divers=VariableExterne::verifChampOptionnel('divers');
        
        if(isset($_REQUEST['intitule']) && isset($_REQUEST['numero'])){
            ModelTelephone::ajouterTelephone($utilisateurModifie);
        }

        if(isset($_POST['libelle_niveau'])){
            $idNiveau=ModelNiveau::rechercherId(Nettoyage::nettoyerChaine($_POST['libelle_niveau']));

            if($idNiveau==false){
                throw new Exception("Aucun niveau utilisateur ne correspond à se libelle", 1);
            }
        }
        else{
            $idNiveau = $utilisateurModifie->idNiveau;
        }
        
        $idAdresse = ModelGestionLieu::gestionAjoutModifAdresse();

        UtilisateurGateway::modifierUtilisateur($utilisateurModifie->userId,$email,$nom,$prenom,$dateDeNaissance,
        $profession,$divers,$avatar,$idNiveau,$idAdresse);

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

    public static function rechercheUtilisateurContactLocal(){
        $tmpContact = ContactLocalGateway::getAll();
        foreach ($tmpContact as $contact) {
            $contactLocal[]=UtilisateurGateway::rechercheUtilisateurId($contact['idUtilisateur']);
        }
        return $contactLocal;
    }

    public static function rechercheUtilisateurContactLocalByIdHop($idHopital){
        $tmpContact = ContactLocalGateway::getAll();
        foreach ($tmpContact as $contact) {
            $contactLocal[]=UtilisateurGateway::rechercheUtilisateurId($contact['idUtilisateur']);
        }
        return $contactLocal;
    }
}