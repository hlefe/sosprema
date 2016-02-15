<?php

class ModelGestionHopital {
    
    public static function rechercherHopital($idHopital){
        $hopital = HopitalGateway::rechercherHopital($idHopital);
        return $hopital;
    }
    
    public static function afficherToutHopital(){
        $hopitaux = HopitalGateway::getAll();
        return $hopitaux;
    }
    
    public static function ajouterHopital(){
       
        $nomHopital = VariableExterne::verifChampObligatoire('nomHopital', 'nomHopital');
        $niveau = VariableExterne::verifChampObligatoire('niveau', 'niveau');
        $service = VariableExterne::verifChampObligatoire('service', 'service');
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
    }
    
    public static function modifierHopital($idHopital){
        
        $nomHopital = VariableExterne::verifChampObligatoire('nomHopital', 'nomHopital');
        $niveau = VariableExterne::verifChampOptionnel('niveau', 'niveau');
        $service = VariableExterne::verifChampObligatoire('service', 'service');
        $nbLits = VariableExterne::verifChampOptionnel('nbLits');
        $nbPremaParAn = VariableExterne::verifChampOptionnel('nbPremaParAn');
        $cafeParent = VariableExterne::verifChampOptionnel('cafeParent');
        $parkingPayant = VariableExterne::verifChampOptionnel('parkingPayant');
        $convention = VariableExterne::verifChampOptionnel('convention');
        $visiteBenevole = VariableExterne::verifChampOptionnel('visiteBenevole');
        
        $idAdresse = ModelGestionLieu::gestionAjoutModifAdresse();
        
        HopitalGateway::modifierHopital($idHopital, $nomHopital, $idAdresse, $niveau, $service, $nbLits, $nbPremaParAn, $cafeParent, $parkingPayant, $convention, $visiteBenevole);
        return HopitalGateway::rechercherHopital($idHopital);        
     
    }
}
