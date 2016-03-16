<?php
/**
* Classe ModelContactLocal
*
* Modèle pour ContactLocal
* @package modele
*/
class ModelContactLocal {
    
    /**
    * Fonction de recherche des données d'un contact local. 
    * 
    * Permet de rechercher les données d'un contact local par l'id utilisateur.
    * @param idUtilisateur correspond à l'id de l'utilisateur auquel on veut récupérer ses données contact local.
    * @return contactLocal retourne l'objet avec les données du contact local.
    */
    public static function rechercherContactLocal($idUtilisateur){
        $contactLocal = ContactLocalGateway::rechercherContactLocalByIdUser($idUtilisateur);
        return $contactLocal;
    }
    
    /**
    * Fonction de recherche des données d'un contact local. 
    * 
    * Permet de rechercher les données d'un contact local par l'id du contact.
    * @param idContact correspond à l'id du contact auquel on veut récupérer ses données contact local.
    * @return contactLocal retourne l'objet avec les données du contact local.
    */
    public static function rechercherContactLocalByIdContact($idcontact){
        $contactLocal = ContactLocalGateway::rechercherContactLocalByIdContact($idcontact);
        return $contactLocal;
    }

    /**
    * Fonction de récupération de l'ensemble des contacts locaux. 
    * 
    * Permet de récupérer l'ensemble des contacts locaux.
    * @return contacts l'ensemble des contatc locaux trouvé.
    */
    public static function afficherToutContact(){
        $contacts = ContactLocalGateway::getAll();
        return $contacts;
    }
    
    /**
    * Fonction d'ajout d'un contact local. 
    * 
    * Permet d'ajouter un contact local.
    * @param idUtilisateur correspond à l'id de l'utilisateur que l'on veut rendre contact local.
    */
    public static function ajouterContactLocal($idUtilisateur){
        
        $datePremierEngagement = " ";
        $dateRenouvellement = " ";
        $dateSenior = " ";
        $visitesBenevoles = " ";
        $conventionHopital = " ";
        $conventionCAMSP = " ";
        $conventionPMI = " ";
        $charteVisiteur = " ";
        ContactLocalGateway::ajouterContactLocal($idUtilisateur, $datePremierEngagement, $dateRenouvellement, $dateSenior, $visitesBenevoles, $conventionHopital, $conventionCAMSP, $conventionPMI, $charteVisiteur);       
    }
    
    /**
    * Fonction de suppression d'un contact. 
    * 
    * Permet de suprimer un contact et les relations qui en dépende.
    * @param idcontact correspond à l'id du contact à suprimer.
    */
    public static function supprimerContact($idcontact){
        ContactLocalGateway::supprimerContact($idcontact);
        RelationGateway::supprimerRelationForContact($idcontact);
    }
    
    /**
    * Fonction de supression d'un contact local par son id utilisateur. 
    * 
    * Permet de suprimer un contact local par son id utilisateur.
    * @param idUtilisateur correspond à l'id de l'utilisateur que l'on veut suprimer.
    */
    public static function supprimerContactLocalByIdUtilisateur($idUtilisateur){
        $contactLocal = self::rechercherContactLocal($idUtilisateur);
        self::supprimerContact($contactLocal->idContact);
    }

    /**
    * Fonction de modification d'un contact local. 
    * 
    * Permet de modifier un contact local.
    * @param idcontact correspond à l'id du contact à modifier.
    */
    public static function modifierContact($idcontact){
        
        $datePremierEngagement = VariableExterne::verifChampObligatoire('datePremierEngagement', 'datePremierEngagement');
        $datePremierEngagement = date('Y-m-d', strtotime(str_replace('/', '-', $datePremierEngagement)));
        
        $dateRenouvellement = VariableExterne::verifChampOptionnel('dateRenouvellement');
        $dateRenouvellement = date('Y-m-d', strtotime(str_replace('/', '-', $dateRenouvellement)));
        
        $dateSenior = VariableExterne::verifChampOptionnel('dateSenior');
        $dateSenior = date('Y-m-d', strtotime(str_replace('/', '-', $dateSenior)));
        
        
        
        $visitesBenevoles = VariableExterne::verifChampOptionnel('visitesBenevoles');
        $conventionHopital = VariableExterne::verifChampOptionnel('conventionHopital');
        $conventionCAMSP = VariableExterne::verifChampOptionnel('conventionCAMSP');
        $conventionPMI = VariableExterne::verifChampOptionnel('conventionPMI');
        $charteVisiteur = VariableExterne::verifChampOptionnel('charteVisiteur');
        
        ContactLocalGateway::modifierContact($idcontact, $datePremierEngagement, $dateRenouvellement, $dateSenior, $visitesBenevoles, $conventionHopital, $conventionCAMSP, $conventionPMI, $charteVisiteur);
    }
    
    /**
    * Fonction de supression d'un enfant. 
    * 
    * Permet de supprimer un enfant.
    * @param idEnfant correspond à l'id de l'enfant à suprimer.
    */
    public static function supprimerEnfant($idEnfant){
        EnfantGateway::supprimerEnfant($idEnfant);
    }

    /**
    * Fonction d'ajout d'un enfant. 
    * 
    * Permet d'ajouter un enfant pour un contact local.
    * @param idContactLocal correspond à l'id d'un contact local.
    */
    public static function ajouterEnfant($idContactLocal){
        EnfantGateway::ajouterEnfant($idContactLocal);
    }
    
    /**
    * Fonction de modification d'un enfant. 
    * 
    * Permet de modifier un enfant d'un contact local.
    * @param idEnfant correspond à l'id de l'enfant à modifier.
    */
    public static function modifierEnfant($idEnfant){
        
        $prenom = VariableExterne::ChampObligatoire('prenom', 'prenom');
        $dateNaissance = VariableExterne::verifChampOptionnel('dateNaisance');
        $termeNaissance = VariableExterne::verifChampOptionnel('termeNaissance');
        
        EnfantGateway::modifierEnfant($idEnfant, $prenom, $dateNaissance, $termeNaissance);
    }

    /**
    * Fonction de recherche des contact locaux par hôpitaux. 
    * 
    * Permet de rechercher les contact locaux par un hôpital.
    * @param idHopital correspond à l'id de l'hôpital dont on recherche les contacts locaux.
    * @return contactLocal retourne l'ensemble des contact locaux de l'hôpital.
    */
    public static function rechercherContactLocalByHopital($idHopital){
        $tmpRelation = RelationGateway::rechercherContactLocalByIdHopital($idHopital);
        if ($tmpRelation == false) {
            return false;
        }
        foreach($tmpRelation as $relation){
            $tmpContact = self::rechercherContactLocalByIdContact($relation['idUtilisateur']);
            if ($tmpContact != false) {
                $id = $tmpContact->idUtilisateur;
                $tmp = UtilisateurGateway::rechercheUtilisateurId($id);
                $contactLocal[] = $tmp;
            }
        }
        return $contactLocal;
    }
}


