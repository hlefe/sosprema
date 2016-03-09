<?php

class ModelContactHopital {
    
    public static function ajouterContactHopital($idHopital)
    {
        $nom = VariableExterne::verifChampOptionnel('nom','nom');
        $prenom = VariableExterne::verifChampOptionnel('prénom', 'prenom');
        $profession = VariableExterne::verifChampOptionnel('profession','profession');
        if ($nom != NULL && $prenom != NULL && $profession != NULL){
        ContactHopitalGateway::ajouterContactHopital($idHopital, $nom, $prenom, $profession);
        }
    }
    
    public static function rechercherContactHopital($idContactHopital){
        return ContactHopitalGateway::rechercherContactHopital($idContactHopital);
    }
    
    public static function getAll(){
        return ContactHopitalGateway::getAll();
    }
    
    public static function supprimerContactHopital($idContactHopital){
        ContactHopitalGateway::supprimerContact($idContactHopital);
    }
    
    public static function modifierContact($idContactHopital, $idHopital, $nom, $prenom, $profession)
    {
        $idHopital = VariableExterne::verifChampObligatoire('idHopital', 'idHopital');
        $nom = VariableExterne::verifChampObligatoire('nom','nom');
        $prenom = VariableExterne::verifChampObligatoire('prénom', 'prenom');
        $profession = VariableExterne::verifChampObligatoire('profession','profession');
        
        return ContactHopitalGateway::ajouterContactHopital($idContactHopital, $idHopital, $nom, $prenom, $profession);
    }

    public static function rechercherContactHopitalByHopital($idHopital){
        return ContactHopitalGateway::rechercherContactHopitalByHopital($idHopital);
    }
}