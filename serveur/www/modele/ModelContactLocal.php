<?php

class ModelContactLocal {
    
    public static function rechercherContactLocal($idUtilisateur){
        $contactLocal = ContactLocalGateway::rechercherContacLocal($idUtilisateur);
        return $contactLocal;
    }
    
    public static function afficherToutContact(){
        $contacts = ContactLocalGateway::getAll();
        return $contacts;
    }
    
    public static function ajouterContactLocal($idUtilisateur, $idHopital){
        
        $datePremierEngagement = VariableExterne::verifChampObligatoire('datePremierEngagement', 'datePremierEngagement');
        $dateRenouvellement = VariableExterne::verifChampOptionnel('dateRenouvellement');
        $dateSenior = VariableExterne::verifChampOptionnel('dateSenior');
        $visitesBenevoles = VariableExterne::verifChampOptionnel('dateBenevoles');
        $conventionHopital = VariableExterne::verifChampOptionnel('conventionHopital');
        $conventionCAMSP = VariableExterne::verifChampOptionnel('conventionCAMSP');
        $conventionPMI = VariableExterne::verifChampOptionnel('conventionPMI');
        $charteVisiteur = VariableExterne::verifChampOptionnel('charteVisiteur');
        
        ContactLocalGateway::ajouterContactLocal($idUtilisateur, $idHopital, $datePremierEngagement, $dateRenouvellement, $dateSenior,
                                                 $visitesBenevoles, $conventionHopital, $conventionCAMSP, $conventionPMI, $charteVisiteur);       
    }
    
    public static function supprimerContact($idcontact){
        ContactLocalGateway::supprimerContact($idcontact);
    }
    
    public static function modifierContact($idcontact){
        
        $datePremierEngagement = VariableExterne::verifChampObligatoire('datePremierEngagement', 'datePremierEngagement');
        $dateRenouvellement = VariableExterne::verifChampOptionnel('dateRenouvellement');
        $dateSenior = VariableExterne::verifChampOptionnel('dateSenior');
        $visitesBenevoles = VariableExterne::verifChampOptionnel('dateBenevoles');
        $conventionHopital = VariableExterne::verifChampOptionnel('conventionHopital');
        $conventionCAMSP = VariableExterne::verifChampOptionnel('conventionCAMSP');
        $conventionPMI = VariableExterne::verifChampOptionnel('conventionPMI');
        $charteVisiteur = VariableExterne::verifChampOptionnel('charteVisiteur');
        
        ContactLocalGateway::modifierContact($idcontact, $datePremierEngagement, $dateRenouvellement, $dateSenior, $visitesBenevoles, $conventionHopital, $conventionCAMSP, $conventionPMI, $charteVisiteur);
    }
    
    public static function supprimerEnafant($idEnfant){
        EnfantGateway::supprimerEnfant($idEnfant);
    }
    
    public static function modifierEnafant($idEnfant){
        
        $prenom = VariableExterne::ChampObligatoire('prenom', 'prenom');
        $dateNaissance = VariableExterne::verifChampOptionnel('dateNaisance');
        $termeNaissance = VariableExterne::verifChampOptionnel('termeNaissance');
        
        EnfantGateway::modifierEnfant($idEnfant, $prenom, $dateNaissance, $termeNaissance);
    }
}


