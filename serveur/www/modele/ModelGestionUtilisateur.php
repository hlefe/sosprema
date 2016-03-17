<?php
/**
* Classe ModelGestionUtilisateur
*
* Modèle pour GestionUtilisateur
* @package modele
*/
class ModelGestionUtilisateur {

    /**
    * Fonction de recherche d'un utilisateur. 
    * 
    * Permet de rechercher un utilisateur avec son adresse email.
    * @param email correspond à l'email de l'utilisateur à rechercher.
    * @return utilisateur retourne l'utilisateur rechercher faux sinon.
    */
    public static function rechercheUtilisateur($email) {
        $utilisateur = UtilisateurGateway::rechercheUtilisateurEmail($email);
        return $utilisateur;
    }

    /**
    * Fonction de création d'un utilisateur. 
    * 
    * Permet de créer un utilisateur.
    */
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

    /**
    * Fonction de modification d'un utilisateur. 
    * 
    * Permet de modifier un utilisateur.
    * @param utilisateurModifie correspond à l'id de l'utilisateur à modifier.
    * @return utilisateur correspond à l'utilisateur modifié.
    */
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
        if(($utilisateurModifie->contactLocal != null) && ($modifProfil = true)){
            ModelContactLocal::modifierContact($utilisateurModifie->contactLocal->idContact);
        }

        UtilisateurGateway::modifierUtilisateur($utilisateurModifie->userId,$email,$nom,$prenom,$dateDeNaissance,
        $profession,$divers,$avatar,$idNiveau,$idAdresse);

        $utilisateur = UtilisateurGateway::rechercheUtilisateurId($utilisateurModifie->userId);        
        
        return $utilisateur;
    }

    /**
    * Fonction de supression d'un utilisateur. 
    * 
    * Permet de supprimer un utilisateur.
    * @param emailConnexion correspond à l'email de connexion de l'utilisateur à supprimer.
    * @return retourne le résultat de la suppression.
    */
    public static function supprimerUtilisateur($emailConnexion) {
        $utilisateur = self::rechercheUtilisateur($emailConnexion);
        if($utilisateur->contactLocal != null){
            ModelContactLocal::supprimerContactLocalByIdUtilisateur($utilisateur->userId);
        }
        return UtilisateurGateway::supprimerUtilisateur($emailConnexion);
    }

    /**
    * Fonction de récupération de l'ensemble des utilisateurs. 
    * 
    * Permet de récupérer l'ensemble des utilisateurs dans la base.
    * @return utilisateurs correspond à la liste des utilisateurs.
    */
    public static function afficherToutUtilisateur() {
        $utilisateurs = UtilisateurGateway::afficherToutUtilisateur();
        return $utilisateurs;
    }


    /**
    * Fonction de modification de mot de passe. 
    * 
    * Permet de modifier le mot de passe d'un utilisateur.
    * @param utilisateur correspond à l'utilisateur dont le mot de passe est modifié.
    * @return utilisateur est l'utilisateur avec le mot de passe qui à été modifié.
    */
    public static function modifierMotDePasse($utilisateur){

        $oldMDP = VariableExterne::verifChampPassword('ancien mot de passe','oldMDP');
        $oldMDP = md5($oldMDP);
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

    /**
    * Fonction de modification du niveau de l'utilisateur. 
    * 
    * Permet de modifier le niveau de droit de l'utilisateur.
    * @param user correspond à l'utilisateur.
    * @param newNiveau correspond au nouveau niveau de l'utilisateur.
    * @return utilisateur correspond au nouvel utilisateur avec son niveau modifié.
    */
    public static function modifierNiveau($user, $newNiveau){
        $utilisateur = UtilisateurGateway::modifierNiveau($user, $newNiveau);
        return $utilisateur;
    }

    /**
    * Fonction de vérification de la présence l'email en base. 
    * 
    * Permet de vérifier si l'adresse email est déjà utilisée ou non.
    * @param email correspond à l'adresse email à vérifier.
    * @return retourne vrai si l'adresse est en base, faux sinon.
    */
    public static function verifierEmailNonPresent($email){
        if(UtilisateurGateway::rechercheUtilisateurEmail($email) != false){
            return true;
        }
        return false;
    }
    
    /**
    * Fonction de modification des accés de l'utilisateur. 
    * 
    * Permet de modifier les accés de l'utilisateur (niveau et mot de passe).
    * @param utilisateurModifie correspond à l'utilisateur à modifier.
    * @return utilisateur est l'utilisateur modifié.
    */
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

    /**
    * Fonction de recherche des utilisateurs qui sont contact local. 
    * 
    * Permet de rechercher des utilisateurs qui sont contacts locaux.
    * @return contactLocal est l'ensemble des utilisateurs qui sont contacts locaux.
    */
    public static function rechercheUtilisateurContactLocal(){
        $tmpContact = ContactLocalGateway::getAll();
        foreach ($tmpContact as $contact) {
            $contactLocal[]=UtilisateurGateway::rechercheUtilisateurId($contact['idUtilisateur']);
        }
        return $contactLocal;
    }

    /**
    * Fonction de recherche des utilisateurs contacts locaux par hôpitaux. 
    * 
    * Permet de rechercher les utilisateurs qui sont contact locaux par hôpitaux.
    * @param idHopital correspond à l'id de l'hôpital dont on recherche les contact locaux.
    * @return contactLocal est l'ensemble des utilisateurs qui sont contacts locaux auprés de l'hôpital.
    */
    public static function rechercheUtilisateurContactLocalByIdHop($idHopital){
        $tmpContact = ContactLocalGateway::getAll();
        foreach ($tmpContact as $contact) {
            $contactLocal[]=UtilisateurGateway::rechercheUtilisateurId($contact['idUtilisateur']);
        }
        return $contactLocal;
    }
}