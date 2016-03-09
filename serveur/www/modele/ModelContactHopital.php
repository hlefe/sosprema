<?php

class ModelContactHopital {
    
    public static function ajouterContactHopital($idHopital)
    {
        $nom = VariableExterne::verifChampOptionnel('nom','nom');
        $prenom = VariableExterne::verifChampOptionnel('prenom', 'prenom');
        $profession = VariableExterne::verifChampOptionnel('profession','profession');
        $numero = VariableExterne::verifChampOptionnel('numero');
        if ($nom != NULL && $prenom != NULL && $profession != NULL && $numero != NULL){
            ContactHopitalGateway::ajouterContactHopital($idHopital, $nom, $prenom, $profession, $numero);
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