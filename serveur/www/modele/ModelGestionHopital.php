<?php
/**
* Classe ModelGestionHopital
*
* Modèle pour GestionHopital
*/
class ModelGestionHopital {
    
    public static function rechercherHopital($idHopital){
        
        $hopital = HopitalGateway::rechercherHopital($idHopital);
        $contactLocal = ModelContactLocal::rechercherContactLocalByHopital($idHopital);
        if($contactLocal != false || $contactLocal != NULL){
            $hopital->listeContactLocal = $contactLocal;
        }
        $contactHopital = ModelContactHopital::rechercherContactHopitalByHopital($idHopital);
        if($contactHopital != false || $contactHopital != NULL){
            $hopital->listeContactHopital = $contactHopital;
        }
        return $hopital;
    }
    
    public static function afficherToutHopital(){
        $hopitaux = HopitalGateway::getAll();
        return $hopitaux;
    }
    
    public static function ajouterHopital(){
       
        $nomHopital = VariableExterne::verifChampObligatoire('nomHopital', 'nomHopital');
        $service = VariableExterne::verifChampOptionnel('service');
        $niveau = $service;
        $nbLits = VariableExterne::verifChampOptionnel('nbLits');
        $nbPremaParAn = VariableExterne::verifChampOptionnel('nbPremaParAn');
        $cafeParent = VariableExterne::verifChampOptionnel('cafeParent');
        $parkingPayant = VariableExterne::verifChampOptionnel('parkingPayant');
        $convention = VariableExterne::verifChampOptionnel('convention');
        $visiteBenevole = VariableExterne::verifChampOptionnel('visiteBenevole');

        $idAdresse = ModelGestionLieu::gestionAjoutModifAdresse();
        
        HopitalGateway::ajouterHopital($nomHopital, $idAdresse, $niveau, $service, $nbLits, $nbPremaParAn,
                                       $cafeParent, $parkingPayant, $convention, $visiteBenevole);
    }
    
    public static function supprimerHopital($idHopital){
        HopitalGateway::supprimerHopital($idHopital);
        RelationGateway::supprimerRelationForHopital($idHopital);
    }
    
    public static function modifierHopital($idHopital){
        
        $nomHopital = VariableExterne::verifChampObligatoire('nomHopital', 'nomHopital');
        $service = VariableExterne::verifChampObligatoire('service', 'service');
                $niveau = $service;
        $nbLits = VariableExterne::verifChampOptionnel('nbLits');
        $nbPremaParAn = VariableExterne::verifChampOptionnel('nbPremaParAn');
        $cafeParent = VariableExterne::verifChampOptionnel('cafeParent');
        $parkingPayant = VariableExterne::verifChampOptionnel('parkingPayant');
        $convention = VariableExterne::verifChampOptionnel('convention');
        $visiteBenevole = VariableExterne::verifChampOptionnel('visiteBenevole');
        $contactHopital = VariableExterne::verifChampOptionnel('contactH');
        $idcontact = VariableExterne::verifChampOptionnel('idContact');
        $idAdresse = ModelGestionLieu::gestionAjoutModifAdresse();
        
        ModelContactHopital::ajouterContactHopital($idHopital);
        ModelRelation::ajouterRelation($idHopital, $idcontact);
        
        HopitalGateway::modifierHopital($idHopital, $nomHopital, $idAdresse, $niveau, $service, $nbLits, $nbPremaParAn, $cafeParent, $parkingPayant, $convention, $visiteBenevole);
        return HopitalGateway::rechercherHopital($idHopital);        
     
    }
}
