<?php

class ModelGestionHopital {
    
    public static function rechercherHopital($nomHopital){
        $hopital = HopitalGateway::rechercherHopital($nomHopital);
        return $hopital;
    }
    
    public static function afficherToutHopital(){
        $hopitaux = HopitalGateway::getAll();
        return $hopitaux;
    }
    
    public static function ajouterHopital($idAdresse){
       
        $nomHopital = VariableExterne::verifChampObligatoire('nomHopital', 'nomHopital');
        $niveau = VariableExterne::verifChampObligatoire('niveau', 'niveau');
        $service = VariableExterne::verifChampObligatoire('service', 'service');
        $nbLits = VariableExterne::verifChampOptionnel('nbLits');
        $nbPremaParAn = VariableExterne::verifChampOptionnel('nbPremaParAn');
        $cafeParent = VariableExterne::verifChampOptionnel('cafeParent');
        $parkingPayant = VariableExterne::verifChampOptionnel('parkingPayant');
        $convention = VariableExterne::verifChampOptionnel('convention');
        $visiteBenevole = VariableExterne::verifChampOptionnel('visiteBenevole');
        
        HopitalGateway::ajouterHopital($nomHopital, $idAdresse, $niveau, $service, $nbLits, $nbPremaParAn,
                                       $cafeParent, $parkingPayant, $convention, $visiteBenevole);
    }
}
