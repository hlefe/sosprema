<?php

class ModelContactLocal {
    
    public static function rechercherContactLocal($idUtilisateur){
        $contactLocal = ContactLocalGateway::rechercherContactLocalByIdUser($idUtilisateur);
        return $contactLocal;
    }
    
    public static function rechercherContactLocalByIdContact($idcontact){
        $contactLocal = ContactLocalGateway::rechercherContactLocalByIdContact($idcontact);
        return $contactLocal;
    }
    public static function afficherToutContact(){
        $contacts = ContactLocalGateway::getAll();
        return $contacts;
    }
    
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
    
    public static function supprimerContact($idcontact){
        ContactLocalGateway::supprimerContact($idcontact);
        RelationGateway::supprimerRelationForContact($idcontact);
    }
    
    public static function supprimerContactLocalByIdUtilisateur($idUtilisateur){
        $contactLocal = self::rechercherContactLocal($idUtilisateur);
        self::supprimerContact($contactLocal->idContact);
    }

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
    
    public static function supprimerEnfant($idEnfant){
        EnfantGateway::supprimerEnfant($idEnfant);
    }

    public static function ajouterEnfant($idContactLocal){
        EnfantGateway::ajouterEnfant($idContactLocal);
    }
    
    public static function modifierEnfant($idEnfant){
        
        $prenom = VariableExterne::ChampObligatoire('prenom', 'prenom');
        $dateNaissance = VariableExterne::verifChampOptionnel('dateNaisance');
        $termeNaissance = VariableExterne::verifChampOptionnel('termeNaissance');
        
        EnfantGateway::modifierEnfant($idEnfant, $prenom, $dateNaissance, $termeNaissance);
    }

    public static function rechercherContactLocalByHopital($idHopital){
        //Fonction réalisée dans la douleure
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


